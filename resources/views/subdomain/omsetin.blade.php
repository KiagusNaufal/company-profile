@extends('layout.header')

@section('content')
    <!-- Works Hero Section -->
    <section>

        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1" />
            <meta charset="utf-8" />
            <style>
                @import url("https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css");

                * {
                    -webkit-font-smoothing: antialiased;
                    box-sizing: border-box;
                }

                html,
                body {
                    margin: 0px;
                    height: 100%;
                }

                /* a blue color as a generic focus style */
                button:focus-visible {
                    outline: 2px solid #4a90e2 !important;
                    outline: -webkit-focus-ring-color auto 5px !important;
                }

                a {
                    text-decoration: none;
                }

                .omsetin-page-desktop {
                    display: flex;
                    flex-direction: column;
                    height: 6767px;
                    align-items: center;
                    position: relative;
                    background-color: #ffffff;
                }

                .omsetin-page-desktop .hero-section {
                    position: relative;
                    width: 1440px;
                    height: 900px;
                    background-color: var(--coolgray-10);
                }

                .omsetin-page-desktop .overlap-group {
                    position: relative;
                    width: 1241px;
                    height: 748px;
                    top: 137px;
                    left: 100px;
                    border-radius: 50px;
                }

                .omsetin-page-desktop .design {
                    position: absolute;
                    width: 400px;
                    height: 748px;
                    top: 0;
                    left: 805px;
                    object-fit: cover;
                }

                .omsetin-page-desktop .frame {
                    display: flex;
                    flex-direction: column;
                    width: 638px;
                    align-items: flex-start;
                    gap: 10px;
                    padding: 10px 20px;
                    position: absolute;
                    top: 42px;
                    left: 78px;
                }

                .omsetin-page-desktop .div {
                    display: flex;
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 24px;
                    position: relative;
                    align-self: stretch;
                    width: 100%;
                    flex: 0 0 auto;
                }

                .omsetin-page-desktop .text-container {
                    display: flex;
                    flex-direction: column;
                    height: 380px;
                    align-items: flex-start;
                    gap: 24px;
                    position: relative;
                    align-self: stretch;
                    width: 100%;
                }

                .omsetin-page-desktop .OMSE-tin {
                    position: relative;
                    align-self: stretch;
                    margin-top: -1.00px;
                    font-family: "Poppins-SemiBold", Helvetica;
                    font-weight: 600;
                    color: transparent;
                    font-size: 92px;
                    letter-spacing: 0;
                    line-height: normal;
                    height: 100px;
                    width: 80%;
                }

                .omsetin-page-desktop .text-wrapper {
                    color: #00c3ff;
                }

                .omsetin-page-desktop .span {
                    color: #ffbe0c;
                }

                .omsetin-page-desktop .p {
                    position: relative;
                    align-self: stretch;
                    height: 260px;
                    margin-bottom: -41.00px;
                    font-family: "Poppins-Regular", Helvetica;
                    font-weight: 400;
                    color: #ffffff;
                    font-size: 24px;
                    letter-spacing: 0;
                    line-height: normal;
                }

                .omsetin-page-desktop .text-wrapper-2 {
                    position: relative;
                    width: 212px;
                    height: 72px;
                    font-family: "Poppins-SemiBold", Helvetica;
                    font-weight: 600;
                    color: #fbbc04;
                    font-size: 32px;
                    letter-spacing: 0;
                    line-height: normal;
                }

                .omsetin-page-desktop .cta-container {
                    display: inline-flex;
                    align-items: center;
                    gap: 42px;
                    position: relative;
                    flex: 0 0 auto;
                }

                .omsetin-page-desktop .div-wrapper {
                    position: relative;
                    width: 212px;
                    height: 63px;
                    background-color: #ffffff;
                    border-radius: 50px;
                }

                .omsetin-page-desktop .text-wrapper-3 {
                    position: absolute;
                    top: 13px;
                    left: 50px;
                    font-family: "Poppins-SemiBold", Helvetica;
                    font-weight: 600;
                    color: #057fd2;
                    font-size: 24px;
                    letter-spacing: 0;
                    line-height: normal;
                }

                .omsetin-page-desktop .frame-2 {
                    position: relative;
                    width: 132px;
                    height: 40px;
                }

                .omsetin-page-desktop .text-wrapper-4 {
                    position: absolute;
                    width: 80px;
                    top: 5px;
                    left: 52px;
                    font-family: "Poppins-SemiBold", Helvetica;
                    font-weight: 600;
                    color: #ffffff;
                    font-size: 24px;
                    letter-spacing: 0;
                    line-height: normal;
                }

                .omsetin-page-desktop .material-symbols {
                    position: absolute;
                    width: 40px;
                    height: 40px;
                    top: 0;
                    left: 0;
                }

                .omsetin-page-desktop .features-section {
                    position: relative;
                    align-self: stretch;
                    width: 100%;
                    height: 548px;
                }

                .omsetin-page-desktop .section {
                    display: flex;
                    width: 1440px;
                    height: 548px;
                    align-items: center;
                    justify-content: space-between;
                    padding: 83px 100px;
                    position: relative;
                }

                .omsetin-page-desktop .placeholder-picture {
                    position: relative;
                    width: 578px;
                    height: 381px;
                    border-radius: 50px;
                    background: linear-gradient(0deg,
                            rgba(221, 225, 230, 1) 0%,
                            rgba(221, 225, 230, 1) 100%);
                }

                .omsetin-page-desktop .content {
                    display: flex;
                    flex-direction: column;
                    width: 578px;
                    height: 381px;
                    align-items: flex-start;
                    gap: 64px;
                    padding: 32px 0px;
                    position: relative;
                }

                .omsetin-page-desktop .frame-3 {
                    display: flex;
                    align-items: flex-start;
                    gap: 24px;
                    position: relative;
                    align-self: stretch;
                    width: 100%;
                    flex: 0 0 auto;
                }

                .omsetin-page-desktop .div-2 {
                    display: flex;
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 16px;
                    position: relative;
                    flex: 1;
                    flex-grow: 1;
                }

                .omsetin-page-desktop .icon-jam-icons {
                    position: relative;
                    width: 48px;
                    height: 48px;
                }

                .omsetin-page-desktop .paragraph {
                    position: relative;
                    align-self: stretch;
                    font-family: var(--body-l-font-family);
                    font-weight: var(--body-l-font-weight);
                    color: var(--coolgray-90);
                    font-size: var(--body-l-font-size);
                    letter-spacing: var(--body-l-letter-spacing);
                    line-height: var(--body-l-line-height);
                    font-style: var(--body-l-font-style);
                }

                .omsetin-page-desktop .section-wrapper {
                    height: 548px;
                    display: flex;
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 10px;
                    position: relative;
                    align-self: stretch;
                    width: 100%;
                }

                .omsetin-page-desktop .section-2 {
                    width: 1440px;
                    height: 548px;
                    align-items: center;
                    justify-content: space-between;
                    padding: 96px 100px;
                    display: flex;
                    position: relative;
                }

                .omsetin-page-desktop .content-2 {
                    width: 578px;
                    height: 381px;
                    padding: 32px 0px;
                    position: relative;
                    margin-top: -12.50px;
                    margin-bottom: -12.50px;
                    display: flex;
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 64px;
                }

                .omsetin-page-desktop .placeholder-picture-2 {
                    margin-top: -12.50px;
                    margin-bottom: -12.50px;
                    position: relative;
                    width: 578px;
                    height: 381px;
                    border-radius: 50px;
                    background: linear-gradient(0deg,
                            rgba(221, 225, 230, 1) 0%,
                            rgba(221, 225, 230, 1) 100%);
                }

                .omsetin-page-desktop .features-section-2 {
                    flex: 0 0 auto;
                    display: flex;
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 10px;
                    position: relative;
                    align-self: stretch;
                    width: 100%;
                }

                .omsetin-page-desktop .section-3 {
                    width: 1440px;
                    height: 548px;
                    align-items: center;
                    justify-content: space-between;
                    padding: 169px 100px;
                    display: flex;
                    position: relative;
                }

                .omsetin-page-desktop .placeholder-picture-3 {
                    margin-top: -85.50px;
                    margin-bottom: -85.50px;
                    position: relative;
                    width: 578px;
                    height: 381px;
                    border-radius: 50px;
                    background: linear-gradient(0deg,
                            rgba(221, 225, 230, 1) 0%,
                            rgba(221, 225, 230, 1) 100%);
                }

                .omsetin-page-desktop .content-3 {
                    width: 578px;
                    height: 381px;
                    padding: 32px 0px;
                    position: relative;
                    margin-top: -85.50px;
                    margin-bottom: -85.50px;
                    display: flex;
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 64px;
                }

                .omsetin-page-desktop .other-feature {
                    position: relative;
                    align-self: stretch;
                    width: 100%;
                    height: 1057px;
                }

                .omsetin-page-desktop .features {
                    position: absolute;
                    width: 1440px;
                    height: 996px;
                    top: 0;
                    left: 0;
                }

                .omsetin-page-desktop .documentation {
                    display: flex;
                    flex-direction: column;
                    width: 1440px;
                    height: 1300px;
                    align-items: center;
                    gap: 36px;
                    position: relative;
                    background-color: #ffffff;
                }

                .omsetin-page-desktop .frame-4 {
                    position: relative;
                    width: 1170px;
                    height: 210px;
                }

                .omsetin-page-desktop .simpel-effective {
                    position: absolute;
                    width: 1235px;
                    top: -1px;
                    left: -31px;
                    font-family: "Poppins-SemiBold", Helvetica;
                    font-weight: 600;
                    color: var(--variable-collection-gray-900);
                    font-size: 96px;
                    text-align: center;
                    letter-spacing: 0;
                    line-height: normal;
                }

                .omsetin-page-desktop .text-wrapper-5 {
                    color: #18181b;
                }

                .omsetin-page-desktop .text-wrapper-6 {
                    color: #4285f4;
                }

                .omsetin-page-desktop .text-wrapper-7 {
                    position: absolute;
                    top: 143px;
                    left: 420px;
                    font-family: "Poppins-SemiBold", Helvetica;
                    font-weight: 600;
                    color: var(--variable-collection-gray-600);
                    font-size: 20px;
                    text-align: center;
                    letter-spacing: 0;
                    line-height: normal;
                }

                .omsetin-page-desktop .desktop {
                    position: relative;
                    width: 1248px;
                    height: 1024px;
                    background-color: #ffffff;
                }

                .omsetin-page-desktop .img {
                    position: absolute;
                    width: 360px;
                    height: 490px;
                    top: 10px;
                    left: 43px;
                    object-fit: cover;
                }

                .omsetin-page-desktop .element {
                    position: absolute;
                    width: 396px;
                    height: 1004px;
                    top: 10px;
                    left: 845px;
                    object-fit: cover;
                }

                .omsetin-page-desktop .element-p {
                    position: absolute;
                    width: 393px;
                    height: 490px;
                    top: 10px;
                    left: 428px;
                    object-fit: cover;
                }

                .omsetin-page-desktop .aapgmyk {
                    position: absolute;
                    width: 777px;
                    height: 490px;
                    top: 524px;
                    left: 43px;
                    object-fit: cover;
                }

                .omsetin-page-desktop .faq-section {
                    width: 1440px;
                    align-items: center;
                    gap: 64px;
                    padding: 80px;
                    flex: 0 0 auto;
                    background-color: var(--coolgray-10);
                    display: flex;
                    flex-direction: column;
                    position: relative;
                }

                .omsetin-page-desktop .section-text {
                    flex-direction: column;
                    width: 1280px;
                    align-items: flex-start;
                    gap: 48px;
                    flex: 0 0 auto;
                    display: flex;
                    position: relative;
                }

                .omsetin-page-desktop .top {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    gap: 8px;
                    position: relative;
                    align-self: stretch;
                    width: 100%;
                    flex: 0 0 auto;
                }

                .omsetin-page-desktop .caption {
                    position: relative;
                    align-self: stretch;
                    margin-top: -1.00px;
                    font-family: var(--other-caption-font-family);
                    font-weight: var(--other-caption-font-weight);
                    color: var(--primary-90);
                    font-size: var(--other-caption-font-size);
                    text-align: center;
                    letter-spacing: var(--other-caption-letter-spacing);
                    line-height: var(--other-caption-line-height);
                    font-style: var(--other-caption-font-style);
                }

                .omsetin-page-desktop .secondary-headline {
                    position: relative;
                    align-self: stretch;
                    font-family: var(--heading-2-font-family);
                    font-weight: var(--heading-2-font-weight);
                    color: var(--coolgray-90);
                    font-size: var(--heading-2-font-size);
                    text-align: center;
                    letter-spacing: var(--heading-2-letter-spacing);
                    line-height: var(--heading-2-line-height);
                    font-style: var(--heading-2-font-style);
                }

                .omsetin-page-desktop .images {
                    display: flex;
                    flex-direction: column;
                    width: 1248px;
                    align-items: flex-start;
                    gap: 16px;
                    position: relative;
                    flex: 0 0 auto;
                }

                .omsetin-page-desktop .FAQ-item {
                    height: 75px;
                    align-items: flex-start;
                    justify-content: center;
                    padding: 16px;
                    align-self: stretch;
                    width: 100%;
                    background-color: var(--defaultwhite);
                    border-radius: 5px;
                    border: 1px solid;
                    border-color: var(--coolgray-20);
                    display: flex;
                    flex-direction: column;
                    position: relative;
                }

                .omsetin-page-desktop .toggle {
                    display: flex;
                    align-items: center;
                    gap: 8px;
                    position: relative;
                    align-self: stretch;
                    width: 100%;
                    flex: 0 0 auto;
                }

                .omsetin-page-desktop .question {
                    position: relative;
                    flex: 1;
                    font-family: var(--heading-5-font-family);
                    font-weight: var(--heading-5-font-weight);
                    color: var(--coolgray-90);
                    font-size: var(--heading-5-font-size);
                    letter-spacing: var(--heading-5-letter-spacing);
                    line-height: var(--heading-5-line-height);
                    font-style: var(--heading-5-font-style);
                }

                .omsetin-page-desktop .icon-jam-icons-2 {
                    position: relative;
                    width: 24px;
                    height: 24px;
                }

                .omsetin-page-desktop .CTA-section {
                    position: relative;
                    align-self: stretch;
                    width: 100%;
                    height: 646px;
                    background-color: #ffffff;
                }

                .omsetin-page-desktop .rectangle {
                    position: absolute;
                    width: 1251px;
                    height: 520px;
                    top: 126px;
                    left: 96px;
                }

                .omsetin-page-desktop .right {
                    display: inline-flex;
                    height: 566px;
                    align-items: flex-start;
                    gap: 10px;
                    padding: 0px 80px;
                    position: absolute;
                    top: 80px;
                    left: 834px;
                    overflow: hidden;
                }

                .omsetin-page-desktop .screen-phone {
                    display: inline-flex;
                    align-items: flex-start;
                    gap: 10px;
                    padding: 8px;
                    position: relative;
                    flex: 0 0 auto;
                    margin-bottom: -200.00px;
                    background-color: #4a3939;
                    border-radius: 60px;
                    border: 1px solid;
                    border-color: #281c1c;
                }

                .omsetin-page-desktop .image {
                    position: relative;
                    width: 350px;
                    height: 558px;
                    object-fit: cover;
                }

                .omsetin-page-desktop .dynamic-island {
                    position: absolute;
                    width: 105px;
                    height: 30px;
                    top: 27px;
                    left: 130px;
                    background-color: #281c1c;
                    border-radius: 20px;
                }

                .omsetin-page-desktop .frame-wrapper {
                    width: 612px;
                    height: 527px;
                    justify-content: center;
                    padding: 80px 20px;
                    position: absolute;
                    top: 137px;
                    left: 96px;
                    display: flex;
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 64px;
                }

                .omsetin-page-desktop .frame-5 {
                    display: flex;
                    flex-direction: column;
                    width: 638px;
                    height: 517px;
                    align-items: flex-start;
                    gap: 10px;
                    padding: 10px 20px;
                    position: relative;
                    margin-top: -75.00px;
                    margin-bottom: -75.00px;
                    margin-right: -66.00px;
                }

                .omsetin-page-desktop .OMSE-tin-2 {
                    position: relative;
                    width: 469px;
                    margin-top: -1.00px;
                    font-family: "Poppins-SemiBold", Helvetica;
                    font-weight: 600;
                    color: transparent;
                    font-size: 92px;
                    text-align: center;
                    letter-spacing: 0;
                    line-height: normal;
                }

                .omsetin-page-desktop .text-wrapper-8 {
                    position: relative;
                    width: 486px;
                    font-family: "Poppins-SemiBold", Helvetica;
                    font-weight: 600;
                    color: #ffffff;
                    font-size: 24px;
                    text-align: center;
                    letter-spacing: 0;
                    line-height: normal;
                }

                .omsetin-page-desktop .text-wrapper-9 {
                    position: relative;
                    width: 254px;
                    height: 72px;
                    font-family: "Poppins-SemiBold", Helvetica;
                    font-weight: 600;
                    color: #fbbc04;
                    font-size: 32px;
                    text-align: center;
                    letter-spacing: 0;
                    line-height: normal;
                }

                .omsetin-page-desktop .overlap-group-wrapper {
                    position: relative;
                    width: 243px;
                    height: 87px;
                }

                .omsetin-page-desktop .overlap-group-2 {
                    position: relative;
                    width: 225px;
                    height: 75px;
                    top: 10px;
                    left: 22px;
                    background-color: #ffffff;
                    border-radius: 50px;
                }

                .omsetin-page-desktop .text-wrapper-10 {
                    position: absolute;
                    top: 9px;
                    left: 38px;
                    font-family: "Poppins-SemiBold", Helvetica;
                    font-weight: 600;
                    color: #057fd2;
                    font-size: 32px;
                    letter-spacing: 0;
                    line-height: normal;
                }

                .omsetin-page-desktop .footer {
                    display: flex;
                    flex-direction: column;
                    align-items: flex-start;
                    justify-content: center;
                    gap: 48px;
                    padding: 48px 80px;
                    position: relative;
                    align-self: stretch;
                    width: 100%;
                    flex: 0 0 auto;
                    margin-bottom: -95.00px;
                    background-color: #04b2f7;
                    opacity: 0.7;
                }

                .omsetin-page-desktop .top-2 {
                    display: flex;
                    align-items: center;
                    gap: 48px;
                    position: relative;
                    align-self: stretch;
                    width: 100%;
                    flex: 0 0 auto;
                }

                .omsetin-page-desktop .logo-container {
                    flex-direction: column;
                    gap: 10px;
                    display: inline-flex;
                    align-items: flex-start;
                    position: relative;
                    flex: 0 0 auto;
                }

                .omsetin-page-desktop .logo {
                    display: inline-flex;
                    align-items: flex-start;
                    gap: 4px;
                    position: relative;
                    flex: 0 0 auto;
                }

                .omsetin-page-desktop .icon-container {
                    position: relative;
                    flex: 0 0 auto;
                }

                .omsetin-page-desktop .text {
                    display: inline-flex;
                    flex-direction: column;
                    align-items: flex-end;
                    justify-content: center;
                    position: relative;
                    flex: 0 0 auto;
                }

                .omsetin-page-desktop .webby-frames {
                    position: relative;
                    width: fit-content;
                    margin-top: -1.00px;
                    font-family: "Poppins-Bold", Helvetica;
                    font-weight: 700;
                    color: var(--coolgray-30);
                    font-size: 24px;
                    letter-spacing: 0;
                    line-height: 26.4px;
                    white-space: nowrap;
                }

                .omsetin-page-desktop .text-wrapper-11 {
                    position: relative;
                    width: fit-content;
                    margin-top: -4px;
                    font-family: "Poppins-Regular", Helvetica;
                    font-weight: 400;
                    color: var(--coolgray-30);
                    font-size: 12px;
                    letter-spacing: 0;
                    line-height: 16.8px;
                    white-space: nowrap;
                }

                .omsetin-page-desktop .form-field-button-wrapper {
                    all: unset;
                    box-sizing: border-box;
                    display: flex;
                    flex-direction: column;
                    align-items: flex-end;
                    justify-content: center;
                    gap: 16px;
                    position: relative;
                    flex: 1;
                    flex-grow: 1;
                }

                .omsetin-page-desktop .form-field-button {
                    all: unset;
                    box-sizing: border-box;
                    display: inline-flex;
                    align-items: center;
                    gap: 16px;
                    position: relative;
                    flex: 0 0 auto;
                }

                .omsetin-page-desktop .field {
                    display: inline-flex;
                    height: 48px;
                    align-items: center;
                    gap: 8px;
                    padding: 12px 16px;
                    position: relative;
                    flex: 0 0 auto;
                    background-color: var(--coolgray-10);
                    border-bottom-width: 1px;
                    border-bottom-style: solid;
                    border-color: var(--coolgray-30);
                }

                .omsetin-page-desktop .input {
                    position: relative;
                    width: fit-content;
                    font-family: "Poppins-Regular", Helvetica;
                    font-weight: 400;
                    color: var(--coolgray-60);
                    font-size: 16px;
                    letter-spacing: 0;
                    line-height: 22.4px;
                    white-space: nowrap;
                    background: transparent;
                    border: none;
                    padding: 0;
                }

                .omsetin-page-desktop .button {
                    all: unset;
                    box-sizing: border-box;
                    display: inline-flex;
                    height: 48px;
                    align-items: center;
                    justify-content: center;
                    padding: 16px 12px;
                    position: relative;
                    flex: 0 0 auto;
                    background-color: var(--variable-collection-color-primary);
                }

                .omsetin-page-desktop .button-text-wrapper {
                    all: unset;
                    box-sizing: border-box;
                    display: inline-flex;
                    align-items: center;
                    justify-content: center;
                    gap: 10px;
                    padding: 0px 16px;
                    position: relative;
                    flex: 0 0 auto;
                }

                .omsetin-page-desktop .button-text {
                    all: unset;
                    box-sizing: border-box;
                    position: relative;
                    width: fit-content;
                    margin-top: -1.00px;
                    font-family: "Poppins-Medium", Helvetica;
                    font-weight: 500;
                    color: var(--defaultwhite);
                    font-size: 16px;
                    letter-spacing: 0.50px;
                    line-height: 16px;
                    white-space: nowrap;
                }

                .omsetin-page-desktop .rectangle-2 {
                    position: relative;
                    align-self: stretch;
                    width: 100%;
                    height: 1px;
                    background-color: var(--coolgray-30);
                }

                .omsetin-page-desktop .div-3 {
                    display: flex;
                    align-items: flex-start;
                    gap: 48px;
                    position: relative;
                    align-self: stretch;
                    width: 100%;
                    flex: 0 0 auto;
                }

                .omsetin-page-desktop .menu-item {
                    display: inline-flex;
                    align-items: center;
                    gap: 8px;
                    padding: 12px 0px;
                    position: relative;
                    flex: 0 0 auto;
                }

                .omsetin-page-desktop .menu-item-2 {
                    position: relative;
                    width: fit-content;
                    margin-top: -1.00px;
                    font-family: "Poppins-Bold", Helvetica;
                    font-weight: 700;
                    color: var(--defaultwhite);
                    font-size: 18px;
                    letter-spacing: 0;
                    line-height: 19.8px;
                    white-space: nowrap;
                }

                .omsetin-page-desktop .menu-item-3 {
                    display: inline-flex;
                    align-items: center;
                    gap: 8px;
                    position: relative;
                    flex: 0 0 auto;
                }

                .omsetin-page-desktop .menu-item-4 {
                    position: relative;
                    width: fit-content;
                    margin-top: -1.00px;
                    font-family: "Poppins-Medium", Helvetica;
                    font-weight: 500;
                    color: var(--defaultwhite);
                    font-size: 16px;
                    letter-spacing: 0;
                    line-height: 16px;
                    white-space: nowrap;
                }

                .omsetin-page-desktop .menu {
                    display: flex;
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 24px;
                    position: relative;
                    flex: 1;
                    flex-grow: 1;
                }

                .omsetin-page-desktop .top-3 {
                    display: inline-flex;
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 16px;
                    position: relative;
                    flex: 0 0 auto;
                }

                .omsetin-page-desktop .buttons-group {
                    display: inline-flex;
                    align-items: flex-start;
                    gap: 8px;
                    position: relative;
                    flex: 0 0 auto;
                }

                .omsetin-page-desktop .button-2 {
                    position: relative;
                    width: 119.66px;
                    height: 40px;
                }

                .omsetin-page-desktop .button-3 {
                    all: unset;
                    box-sizing: border-box;
                    position: relative;
                    width: 135px;
                    height: 40px;
                    background-image: url(./img/vector-2.svg);
                    background-size: 100% 100%;
                }

                .omsetin-page-desktop .overlap-group-3 {
                    position: relative;
                    height: 40px;
                    background-image: url(./img/vector-4.svg);
                    background-size: 100% 100%;
                }

                .omsetin-page-desktop .text-wrapper-12 {
                    position: absolute;
                    top: 3px;
                    left: 40px;
                    -webkit-text-stroke: 0.2px #ffffff;
                    font-family: "Open Sans-Regular", Helvetica;
                    font-weight: 400;
                    color: #ffffff;
                    font-size: 8.4px;
                    letter-spacing: 0;
                    line-height: normal;
                }

                .omsetin-page-desktop .vector {
                    position: absolute;
                    width: 85px;
                    height: 17px;
                    top: 17px;
                    left: 41px;
                }

                .omsetin-page-desktop .overlap {
                    position: absolute;
                    width: 23px;
                    height: 26px;
                    top: 7px;
                    left: 10px;
                }

                .omsetin-page-desktop .vector-2 {
                    position: absolute;
                    width: 16px;
                    height: 13px;
                    top: 12px;
                    left: 0;
                }

                .omsetin-page-desktop .vector-3 {
                    position: absolute;
                    width: 13px;
                    height: 11px;
                    top: 7px;
                    left: 10px;
                }

                .omsetin-page-desktop .vector-4 {
                    position: absolute;
                    width: 11px;
                    height: 21px;
                    top: 2px;
                    left: 0;
                }

                .omsetin-page-desktop .vector-5 {
                    position: absolute;
                    width: 16px;
                    height: 13px;
                    top: 0;
                    left: 0;
                }

                .omsetin-page-desktop .bottom {
                    display: inline-flex;
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 8px;
                    position: relative;
                    flex: 0 0 auto;
                    margin-right: -142.67px;
                }

                .omsetin-page-desktop .social-icons {
                    display: flex;
                    width: 426.67px;
                    align-items: center;
                    gap: 16px;
                    position: relative;
                    flex: 0 0 auto;
                }

                .omsetin-page-desktop .text-wrapper-13 {
                    position: relative;
                    width: fit-content;
                    margin-top: -1.00px;
                    font-family: "Poppins-Regular", Helvetica;
                    font-weight: 400;
                    color: var(--defaultwhite);
                    font-size: 14px;
                    letter-spacing: 0;
                    line-height: 19.6px;
                    white-space: nowrap;
                }

                .omsetin-page-desktop .menu-2 {
                    display: flex;
                    align-items: center;
                    justify-content: flex-end;
                    gap: 16px;
                    position: relative;
                    flex: 1;
                    flex-grow: 1;
                }

                .omsetin-page-desktop .menu-item-5 {
                    display: inline-flex;
                    align-items: center;
                    gap: 8px;
                    padding: 12px 8px;
                    position: relative;
                    flex: 0 0 auto;
                }

                .omsetin-page-desktop .header {
                    display: flex;
                    width: 1440px;
                    align-items: center;
                    gap: 48px;
                    padding: 16px 80px;
                    position: absolute;
                    top: 0;
                    left: 0;
                    background-color: #ffffff;
                }

                .omsetin-page-desktop .logo-2 {
                    gap: 4px;
                    box-shadow: 0px 4px 4px #00000040;
                    background-image: url(./img/logo.png);
                    background-size: cover;
                    background-position: 50% 50%;
                    display: inline-flex;
                    align-items: flex-start;
                    position: relative;
                    flex: 0 0 auto;
                }

                .omsetin-page-desktop .menu-3 {
                    display: flex;
                    width: 794px;
                    align-items: center;
                    justify-content: flex-end;
                    gap: 8px;
                    position: relative;
                }

                .omsetin-page-desktop .menu-item-6 {
                    position: relative;
                    width: fit-content;
                    margin-top: -1.00px;
                    font-family: "Poppins-Medium", Helvetica;
                    font-weight: 500;
                    color: var(--coolgray-90);
                    font-size: 16px;
                    letter-spacing: 0;
                    line-height: 16px;
                    white-space: nowrap;
                }

                .omsetin-page-desktop .button-wrapper {
                    display: flex;
                    width: 256px;
                    align-items: center;
                    gap: 16px;
                    position: relative;
                    margin-right: -47.00px;
                }

                .omsetin-page-desktop .button-4 {
                    all: unset;
                    box-sizing: border-box;
                    display: flex;
                    width: 100px;
                    height: 48px;
                    align-items: center;
                    justify-content: center;
                    padding: 16px 12px;
                    position: relative;
                    border-radius: 10px;
                    border: 1px solid;
                    border-color: #686868;
                }

                .omsetin-page-desktop .text-container-2 {
                    margin-left: -5.00px;
                    margin-right: -5.00px;
                    display: inline-flex;
                    align-items: center;
                    justify-content: center;
                    gap: 10px;
                    padding: 0px 16px;
                    position: relative;
                    flex: 0 0 auto;
                }

                .omsetin-page-desktop .button-text-2 {
                    position: relative;
                    width: fit-content;
                    margin-top: -1.00px;
                    font-family: "Poppins-Medium", Helvetica;
                    font-weight: 500;
                    color: #5d5d5d;
                    font-size: 16px;
                    letter-spacing: 0.50px;
                    line-height: 16px;
                    white-space: nowrap;
                }

                :root {
                    --coolgray-90: rgba(33, 39, 42, 1);
                    --primary-90: rgba(0, 29, 108, 1);
                    --coolgray-30: rgba(193, 199, 205, 1);
                    --coolgray-60: rgba(105, 112, 119, 1);
                    --defaultwhite: rgba(255, 255, 255, 1);
                    --coolgray-10: rgba(242, 244, 248, 1);
                    --coolgray-20: rgba(221, 225, 230, 1);
                    --text-font-family: "Poppins", Helvetica;
                    --text-font-weight: 400;
                    --text-font-size: 12px;
                    --text-letter-spacing: 0px;
                    --text-line-height: normal;
                    --text-font-style: normal;
                    --body-l-font-family: "Roboto", Helvetica;
                    --body-l-font-weight: 400;
                    --body-l-font-size: 18px;
                    --body-l-letter-spacing: 0px;
                    --body-l-line-height: 139.9999976158142%;
                    --body-l-font-style: normal;
                    --other-caption-font-family: "Roboto", Helvetica;
                    --other-caption-font-weight: 700;
                    --other-caption-font-size: 20px;
                    --other-caption-letter-spacing: 1px;
                    --other-caption-line-height: 100%;
                    --other-caption-font-style: normal;
                    --heading-2-font-family: "Roboto", Helvetica;
                    --heading-2-font-weight: 700;
                    --heading-2-font-size: 42px;
                    --heading-2-letter-spacing: 0px;
                    --heading-2-line-height: 110.00000238418579%;
                    --heading-2-font-style: normal;
                    --heading-5-font-family: "Roboto", Helvetica;
                    --heading-5-font-weight: 700;
                    --heading-5-font-size: 20px;
                    --heading-5-letter-spacing: 0px;
                    --heading-5-line-height: 110.00000238418579%;
                    --heading-5-font-style: normal;
                    --variable-collection-color-primary: rgba(255, 255, 255, 1);
                    --variable-collection-gray-900: rgba(24, 24, 27, 1);
                    --variable-collection-gray-600: rgba(82, 82, 91, 1);
                }
            </style>
            {{-- <link rel="stylesheet" href="globals.css" />
            <link rel="stylesheet" href="styleguide.css" />
            <link rel="stylesheet" href="style.css" /> --}}
        </head>
        {{-- Hero Section --}}
        <section class="relative h-screen overflow-hidden">
  <!-- Blue rectangle background -->
  <div class="absolute right-0 top-1/2 w-1/2 h-full bg-blue-500 -translate-y-1/2 rounded-l-[50px] z-0"></div>

  <!-- Content container -->
  <div class="container relative h-full mx-auto flex items-center z-10">
    <div class="w-full md:w-1/2 space-y-6 p-8">
      <h1 class="text-4xl font-bold text-gray-800">OMSET in</h1>
      <p class="text-gray-600">
        Lorem ipsum dolor sit amet consectetur. Ante suscipit porta ipsum gravida aliquam pretium enim...
      </p>

      <div class="space-y-4">
        <p class="text-2xl font-bold text-gray-800">Rp. 100.000</p>

        <div class="flex gap-4">
          <button class="bg-blue-500 text-white px-6 py-2 rounded-full hover:bg-blue-600 transition">
            Buy now!
          </button>
          <button class="border-2 border-gray-300 text-gray-600 px-6 py-2 rounded-full hover:bg-gray-50 transition">
            Share!
          </button>
        </div>
      </div>
    </div>
  </div>
</section>
        <section>
            <div class="omsetin-page-desktop">
                <div class="hero-section">
                    <div class="">

                    </div>
                    <div class="overlap-group">
                        <img class="design" src="{{ secure_asset('image/omsetin/phone-mockup.png') }}" />
                        <div class="frame">
                            <div class="div">
                                <div class="text-container">
                                    <img class="OMSE-tin" src="{{ secure_asset('image/omsetin/omsetin.png') }}"></img>
                                    <p class="p">
                                        Lorem ipsum dolor sit amet consectetur. Ante suscipit porta ipsum gravida aliquam
                                        pretium enim. Tempor
                                        quam dapibus viverra dolor amet tincidunt. Velit sed interdum odio sollicitudin.
                                        Eget mattis non vitae
                                        tristique penatibus hendrerit lobortis pharetra.
                                    </p>
                                </div>
                                <div class="text-wrapper-2">Rp. 100.000</div>
                                <div class="cta-container">
                                    <div class="div-wrapper">
                                        <div class="text-wrapper-3">Buy now!</div>
                                    </div>
                                    <div class="frame-2">
                                        <div class="text-wrapper-4">Share!</div>
                                        <img class="material-symbols" src="img/material-symbols-share.svg" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

        {{-- feature section --}}
        <section>
            <div class="features-section">
                <div class="section">
                    <div class="placeholder-picture"></div>
                    <div class="content">
                        <div class="frame-3">
                            <div class="div-2">
                                <img class="icon-jam-icons" src="img/calendar.svg" />
                                <p class="paragraph">Egestas elit dui scelerisque ut eu purus aliquam vitae habitasse.
                                </p>
                            </div>
                            <div class="div-2">
                                <img class="icon-jam-icons" src="img/luggage-2.svg" />
                                <p class="paragraph">Id eros pellentesque facilisi id mollis faucibus commodo enim.</p>
                            </div>
                        </div>
                        <div class="frame-3">
                            <div class="div-2">
                                <img class="icon-jam-icons" src="img/activity.svg" />
                                <p class="paragraph">Tristique elementum, ac maecenas enim fringilla placerat
                                    scelerisque semper.</p>
                            </div>
                            <div class="div-2">
                                <img class="icon-jam-icons" src="img/car.svg" />
                                <p class="paragraph">Curabitur magna cras euismod pharetra, mauris malesuada sit enim,
                                    elementum.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-wrapper">
                <div class="section-2">
                    <div class="content-2">
                        <div class="frame-3">
                            <div class="div-2">
                                <img class="icon-jam-icons" src="img/calendar.svg" />
                                <p class="paragraph">Egestas elit dui scelerisque ut eu purus aliquam vitae habitasse.
                                </p>
                            </div>
                            <div class="div-2">
                                <img class="icon-jam-icons" src="img/luggage-2.svg" />
                                <p class="paragraph">Id eros pellentesque facilisi id mollis faucibus commodo enim.</p>
                            </div>
                        </div>
                        <div class="frame-3">
                            <div class="div-2">
                                <img class="icon-jam-icons" src="img/activity.svg" />
                                <p class="paragraph">Tristique elementum, ac maecenas enim fringilla placerat
                                    scelerisque semper.</p>
                            </div>
                            <div class="div-2">
                                <img class="icon-jam-icons" src="img/car.svg" />
                                <p class="paragraph">Curabitur magna cras euismod pharetra, mauris malesuada sit enim,
                                    elementum.</p>
                            </div>
                        </div>
                    </div>
                    <div class="placeholder-picture-2"></div>
                </div>
            </div>

            <div class="features-section-2">
                <div class="section-3">
                    <div class="placeholder-picture-3"></div>
                    <div class="content-3">
                        <div class="frame-3">
                            <div class="div-2">
                                <img class="icon-jam-icons" src="img/calendar.svg" />
                                <p class="paragraph">Egestas elit dui scelerisque ut eu purus aliquam vitae habitasse.
                                </p>
                            </div>
                            <div class="div-2">
                                <img class="icon-jam-icons" src="img/luggage.svg" />
                                <p class="paragraph">Id eros pellentesque facilisi id mollis faucibus commodo enim.</p>
                            </div>
                        </div>
                        <div class="frame-3">
                            <div class="div-2">
                                <img class="icon-jam-icons" src="img/activity-2.svg" />
                                <p class="paragraph">Tristique elementum, ac maecenas enim fringilla placerat
                                    scelerisque semper.</p>
                            </div>
                            <div class="div-2">
                                <img class="icon-jam-icons" src="img/car.svg" />
                                <p class="paragraph">Curabitur magna cras euismod pharetra, mauris malesuada sit enim,
                                    elementum.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- other features section --}}
        <section>
            <div class="other-feature"><img class="features" src="img/features-9.png" /></div>
            <div class="documentation">
                <div class="frame-4">
                    <p class="simpel-effective">
                        <span class="text-wrapper-5">Simpel.</span>
                        <span class="text-wrapper-6">Effective</span>
                        <span class="text-wrapper-5">.Easy</span>
                    </p>
                    <p class="text-wrapper-7">Lorem ipsum et aliquam semper</p>
                </div>
                <div class="desktop">
                    <img class="img" src="img/945e51c261bceef31f3b6147e53f3349-1.png" />
                    <img class="element" src="img/99202504-p0.png" />
                    <img class="element-p" src="img/125808437-p0-1.png" />
                    <img class="aapgmyk" src="img/aa1pgmyk-1.png" />
                </div>
            </div>
        </section>

        {{-- faq-section --}}
        <section class="py-10 bg-gray-50 sm:py-16 lg:py-24">
            <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
                <div class="max-w-2xl mx-auto text-center">
                    <h2 class="text-3xl font-bold leading-tight text-black sm:text-4xl lg:text-5xl">Frequently Asked
                        Questions</h2>
                    <p class="max-w-xl mx-auto mt-4 text-base leading-relaxed text-gray-600">Amet minim mollit non deserunt
                        ullamco est sit aliqua dolor do</p>
                </div>

                <div class="max-w-3xl mx-auto mt-8 space-y-4 md:mt-16">
                    <div
                        class="transition-all duration-200 bg-white border border-gray-200 shadow-lg cursor-pointer hover:bg-gray-50">
                        <button type="button" class="flex items-center justify-between w-full px-4 py-5 sm:p-6">
                            <span class="flex text-lg font-semibold text-black"> How to create an account? </span>

                            <svg class="w-6 h-6 text-gray-400 rotate-180" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div class="px-4 pb-5 sm:px-6 sm:pb-6">
                            <p>Amet minim mollit non deserunt ullamco est sit <a href="#" title=""
                                    class="text-blue-600 transition-all duration-200 hover:underline">aliqua dolor</a> do
                                amet sint. Velit officia consequat duis enim velit mollit.</p>
                        </div>
                    </div>

                    <div
                        class="transition-all duration-200 bg-white border border-gray-200 cursor-pointer hover:bg-gray-50">
                        <button type="button" class="flex items-center justify-between w-full px-4 py-5 sm:p-6">
                            <span class="flex text-lg font-semibold text-black"> How can I make payment using Paypal?
                            </span>

                            <svg class="w-6 h-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div class="hidden px-4 pb-5 sm:px-6 sm:pb-6">
                            <p>Amet minim mollit non deserunt ullamco est sit <a href="#" title=""
                                    class="text-blue-600 transition-all duration-200 hover:underline">aliqua dolor</a> do
                                amet sint. Velit officia consequat duis enim velit mollit.</p>
                        </div>
                    </div>

                    <div
                        class="transition-all duration-200 bg-white border border-gray-200 cursor-pointer hover:bg-gray-50">
                        <div class="">
                            <button type="button" class="flex items-center justify-between w-full px-4 py-5 sm:p-6">
                                <span class="flex text-lg font-semibold text-black"> Can I cancel my plan? </span>

                                <svg class="w-6 h-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div class="hidden px-4 pb-5 sm:px-6 sm:pb-6">
                                <p>Amet minim mollit non deserunt ullamco est sit <a href="#" title=""
                                        class="text-blue-600 transition-all duration-200 hover:underline">aliqua dolor</a>
                                    do amet sint. Velit officia consequat duis enim velit mollit.</p>
                            </div>
                        </div>
                    </div>

                    <div
                        class="transition-all duration-200 bg-white border border-gray-200 cursor-pointer hover:bg-gray-50">
                        <button type="button" class="flex items-center justify-between w-full px-4 py-5 sm:p-6">
                            <span class="flex text-lg font-semibold text-black"> How can I reach to support? </span>

                            <svg class="w-6 h-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div class="hidden px-4 pb-5 sm:px-6 sm:pb-6">
                            <p>Amet minim mollit non deserunt ullamco est sit <a href="#" title=""
                                    class="text-blue-600 transition-all duration-200 hover:underline">aliqua dolor</a> do
                                amet sint. Velit officia consequat duis enim velit mollit.</p>
                        </div>
                    </div>
                </div>

                <p class="text-center text-gray-600 textbase mt-9">Didn’t find the answer you are looking for? <a
                        href="#" title=""
                        class="font-medium text-blue-600 transition-all duration-200 hover:text-blue-700 focus:text-blue-700 hover:underline">Contact
                        our support</a></p>
            </div>
        </section>

        <section>
            <div class="faq-section">
                <div class="section-text">
                    <div class="top">
                        <div class="caption">CAPTION</div>
                        <div class="secondary-headline">FAQ</div>
                    </div>
                </div>
                <div class="images">
                    <div class="FAQ-item">
                        <div class="toggle">
                            <p class="question">Who should use the app?</p>
                            <img class="icon-jam-icons-2" src="img/plus.svg" />
                        </div>
                    </div>
                    <div class="FAQ-item">
                        <div class="toggle">
                            <p class="question">What is included with my subscription?</p>
                            <img class="icon-jam-icons-2" src="img/plus.svg" />
                        </div>
                    </div>
                    <div class="FAQ-item">
                        <div class="toggle">
                            <p class="question">How do I get paid?</p>
                            <img class="icon-jam-icons-2" src="img/plus.svg" />
                        </div>
                    </div>
                    <div class="FAQ-item">
                        <div class="toggle">
                            <p class="question">Is my personal information safe?</p>
                            <img class="icon-jam-icons-2" src="img/plus.svg" />
                        </div>
                    </div>
                    <div class="FAQ-item">
                        <div class="toggle">
                            <p class="question">How can we get in touch?</p>
                            <img class="icon-jam-icons-2" src="img/plus.svg" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- cta section --}}
        <section>
            <div class="CTA-section">
                <img class="rectangle" src="img/rectangle-3.svg" />
                <div class="right">
                    <div class="screen-phone">
                        <img class="image" src="img/image.svg" />
                        <div class="dynamic-island"></div>
                    </div>
                </div>
                <div class="frame-wrapper">
                    <div class="frame-5">
                        <div class="div">
                            <div class="div">
                                <p class="OMSE-tin-2"><span class="text-wrapper">OMSET</span> <span
                                        class="span">in</span></p>
                                <p class="text-wrapper-8">Tunggu apa lagi ayo beli sekarang!</p>
                            </div>
                            <div class="text-wrapper-9">Rp. 100.000</div>
                        </div>
                        <div class="overlap-group-wrapper">
                            <div class="overlap-group-2">
                                <div class="text-wrapper-10">Buy now!</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </div>
    </section>


    <!-- CTA Section -->
    <x-cta-section></x-cta-section>

    <!-- Payment Modal -->
    @include('partials.form-pembayaran')
@endsection
