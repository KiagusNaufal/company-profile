<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SerialNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Cloudinary\Configuration\Configuration;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class SerialNumberController extends Controller
{

    public function index()
    {
        $serialNumbers = SerialNumber::paginate(10);
        return view('admin.serial.index', compact('serialNumbers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phoneNumber' => 'nullable|string|max:20',
            'image' => 'nullable|image|max:10240', // max 10MB
        ]);

        try {
            // Generate unique serial number
            do {
                $serialNumber = 'SN' . strtoupper(bin2hex(random_bytes(5)));
            } while (SerialNumber::where('serialNumber', $serialNumber)->exists());

            // Generate random password
            $plainPassword = bin2hex(random_bytes(4)); // 8 chars
            $hashedPassword = Hash::make($plainPassword);

            $validated['serialNumber'] = $serialNumber;
            $validated['password'] = $hashedPassword;
            $validated['is_active'] = 1; // Set default value for is_active

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('produk_images', 'public');
                $validated['profileImage'] = '/storage/' . $imagePath;
            }

            $serial = SerialNumber::create($validated);

            return redirect('serial')->with('success', 'Serial number created successfully!');
        } catch (\Exception $e) {
            return redirect('serial')->with('error', 'Failed to create serial number: ' . $e->getMessage());
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $serial = SerialNumber::find($id);

            if (!$serial) {
                return redirect('serial')->with('error', 'Serial number not found!');
            }

            // Update serial number data
            $validated = $request->validate([
                'serialNumber' => 'required|string|max:255',
                'password' => 'nullable|string|min:8',
                'name' => 'nullable|string|max:255',
                'email' => 'nullable|email|max:255',
                'phoneNumber' => 'nullable|string|max:20',
                'image' => 'nullable|image|max:10240', // max 10MB
            ]);

            // Hash password if provided
            if (!empty($validated['password'])) {
                // Only hash if not already hashed (assume hashed if starts with $2y$)
                if (strpos($validated['password'], '$2y$') !== 0) {
                    $validated['password'] = Hash::make($validated['password']);
                }
            } else {
                unset($validated['password']);
            }

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('produk_images', 'public');
                $validated['profileImage'] = '/storage/' . $imagePath;
            }

            $serial->update($validated);

            return redirect('serial')->with('success', 'Serial number updated successfully!');
        } catch (\Exception $e) {
            return redirect('serial')->with('error', 'Failed to update serial number: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $product = SerialNumber::findOrFail($id);

        // Delete the image file if it exists
        if ($product->profileImage && Storage::disk('public')->exists($product->profileImage)) {
            Storage::disk('public')->delete($product->profileImage);
        }

        $product->delete();

        return redirect()->route('serial')->with('success', 'Produk berhasil dihapus.');
    }
    public function login(Request $request)
    {
        $request->validate([
            'serialNumber' => 'required',
            'password' => 'required',
        ]);

        $serial = SerialNumber::where('serialNumber', $request->serialNumber)->first();

        if (!$serial || !Hash::check($request->password, $serial->password)) {
            Log::error('Login failed: Invalid credentials', [
                'serialNumber' => $request->serialNumber,
                'ip' => $request->ip(),
            ]);
            throw ValidationException::withMessages([
                'serialNumber' => ['The provided credentials are incorrect.'],
            ]);
        }

        // Check if account is active
        if (!$serial->is_active) {
            Log::warning('Login failed: Account not active', [
                'serialNumber' => $request->serialNumber,
                'ip' => $request->ip(),
            ]);
            return response()->json([
                'message' => 'Account is not active'
            ], 403);
        }

        // Check if already logged in elsewhere
        if ($serial->last_login_at && \Carbon\Carbon::parse($serial->last_login_at)->diffInMinutes(now()) < 5) {
            Log::warning('Login failed: Already logged in elsewhere', [
                'serialNumber' => $request->serialNumber,
                'ip' => $request->ip(),
            ]);
            return response()->json([
                'message' => 'This account is already logged in elsewhere'
            ], 403);
        }

        // Update last login time
        $serial->last_login_at = now();
        $serial->save();

        $token = JWTAuth::fromUser($serial);

        return response()->json([
            'status' => 'success',
            'serial' => $serial,
            'token' => $token,
        ]);
    }


    public function changePassword(Request $request, $serialNumberId)
{
    try {
        $validated = $request->validate([
            'oldPassword' => 'required|string',
            'newPassword' => 'required|string|min:8',
        ]);

        // Find the serial number by ID
        $serialNumber = SerialNumber::find($serialNumberId);

        if (!$serialNumber) {
            return response()->json([
                'message' => 'Serial number not found'
            ], 404);
        }

        // Check if the old password is correct
        if (!Hash::check($request->oldPassword, $serialNumber->password)) {
            return response()->json([
                'message' => 'Old password is incorrect'
            ], 401);
        }

        // Hash the new password
        $hashedNewPassword = Hash::make($request->newPassword);

        // Update the password
        $serialNumber->password = $hashedNewPassword;
        $serialNumber->save();

        return response()->json([
            'message' => 'Password updated successfully'
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'message' => $e->getMessage()
        ], 500);
    }
}


public function update(Request $request, $serialNumberId)
{
    Log::info("Request received to update serial number details", [
        'Serial Number ID' => $serialNumberId,
        'Request Body' => $request->all(),
        'File' => $request->file('image'),
    ]);

    // Validate input first
    $validated = $request->validate([
        'name' => 'nullable|string|max:255',
        'email' => 'nullable|email|max:255',
        'phoneNumber' => 'nullable|string|max:20',
        'image' => 'nullable|image|max:10240', // max 10MB
    ]);

    try {
        $updateData = [];
        if (array_key_exists('name', $validated)) {
            $updateData['name'] = $validated['name'];
        }
        if (array_key_exists('email', $validated)) {
            $updateData['email'] = $validated['email'];
        }
        if (array_key_exists('phoneNumber', $validated)) {
            $updateData['phoneNumber'] = $validated['phoneNumber'];
        }

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('produk_images', 'public');
            // $imagePath = produk_images/xxx.jpg
            $updateData['profileImage'] = '/storage/' . $imagePath; // This is the public URL via storage:link
            Log::info("File uploaded to storage: " . $updateData['profileImage']);
        } elseif ($request->profileImage && str_starts_with($request->profileImage, 'assets/')) {
            Log::info("Profile image is an asset path, skipping upload");
            $updateData['profileImage'] = asset($request->profileImage);
        }

        Log::info("Updating serial number in database...");
        $updatedSerialNumber = SerialNumber::find($serialNumberId);

        if (!$updatedSerialNumber) {
            Log::warning("Serial number not found");
            return response()->json(['message' => 'Serial number not found'], 404);
        }

        $updatedSerialNumber->update($updateData);

        Log::info("Serial number updated successfully", ['data' => $updatedSerialNumber]);

        return response()->json($updatedSerialNumber, 200);
    } catch (\Exception $e) {
        Log::error("Error updating serial number: " . $e->getMessage());
        return response()->json(['message' => $e->getMessage()], 500);
    }
}
    public function show($serialNumberId)
    {
        try {
            $serialNumber = SerialNumber::find($serialNumberId);
            
            if (!$serialNumber) {
                return response()->json(['message' => 'Serial number not found'], 404);
            }

            return response()->json($serialNumber);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function logout()
    {
        Log::info('Logging out user', [
            'serialNumber' => JWTAuth::user()->serialNumber,
            'ip' => request()->ip(),
            request()->all()
        ]);
        $serial = JWTAuth::user();

        if ($serial) {
            $serial->last_login_at = null;
            $serial->save();
        }

        JWTAuth::invalidate(JWTAuth::getToken());

        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'serial' => JWTAuth::user(),
            'authorization' => [
                'token' => JWTAuth::refresh(),
                'type' => 'bearer',
                'expires_in' => config('jwt.ttl') * 60
            ]
        ]);
    }

    public function me()
    {
        return response()->json([
            'status' => 'success',
            'serial' => JWTAuth::user()
        ]);
    }
}