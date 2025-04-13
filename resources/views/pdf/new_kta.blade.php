<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KTA {{ $member->name . ' ' . $member->member_number }}</title>
    <style>
        @font-face {
            font-family: 'Roboto';
            src: url("{{ public_path('assets/front/fonts/Roboto-Regular.ttf') }}") format("truetype");
        }

        @font-face {
            font-family: 'BarlowCondensed-Light';
            src: url("{{ public_path('assets/front/fonts/BarlowCondensed-Light.ttf') }}") format("truetype");
        }

        @font-face {
            font-family: 'BarlowCondensed-SemiBold';
            src: url("{{ public_path('assets/front/fonts/BarlowCondensed-SemiBold.ttf') }}") format("truetype");
        }
    </style>
</head>

<body style="padding: 0; margin: 0">
    <div
        style="margin: 250px;
                    margin-left:33%;
                    margin-bottom: 2rem;
                    width: 752px;
                    height: 1200px;">
        <figure
            style="
                            position: relative;
                            overflow: hidden;
                            width: 100%;
                            height: 100%;
                            margin: 0;
                            background-image: url({{ $front }});
                            background-size: cover;
                            background-repeat: no-repeat">
            <div
                style="position: absolute;
                            left: 50%;
                            top: 160px;
                            border-radius: 50%;
                            width: 215px;
                            height: 215px;
                            border: 8px solid black;
                            overflow: hidden;
                            transform: translateX(-50%)">
                <img style="object-fit: cover; width: 100%; height: 100%; object-position: center"
                    src="{{ $avatar }}">
            </div>
            <div
                style="position: absolute;
                        left: 50%;
                        top: 385px;
                        transform: translateX(-50%);
                        font-family: 'BarlowCondensed-Light';
                        font-size: 52px;
                        color: black;
                        width: 100%;
                        text-align: center">
                <p style="margin: 0">
                    {{ $member->member_number }}
                </p>
            </div>
            <div
                style="position: absolute;
                        left: 50%;
                        top: 490px;
                        transform: translateX(-50%);
                        font-family: 'BarlowCondensed-SemiBold';
                        font-size: 64px;
                        color: black;
                        width: 90%;
                        line-height: .75;
                        text-align: center;
                        text-transform: uppercase;">
                <p style="margin: 0; margin-top: -20px">
                    {{ $member->name }}
                </p>
            </div>
            <div
                style="position: absolute;
                        left: 125px;
                        top: 740px;
                        font-family: 'Roboto';
                        font-size: 24px;
                        line-height: 1.25;
                        color: white;
                        padding-right: 100px;">
                <p style="margin-top: 0">
                    {{ $member->fullAddress() }}
                </p>
                {{-- <p style="margin: 0; margin-bottom: .05rem">{{ $member->address }}</p>
                <p style="margin-top: 0">
                    {{ $member->village->name . ', ' . $member->district->name . ', ' . $member->regency->name . ', Provinsi ' . $member->province->name }}
                </p> --}}
            </div>
            {{-- <div
                style="position: absolute;
                        right: 80px;
                        bottom: 120px;
                        margin-top: 1rem; text-align: right;">
                <img style="width: 240px;" src="{{ $signature }}">
            </div> --}}

            <div
                style="position: absolute;
                        right: 5px;
                        bottom: 100px;
                        font-family: 'Roboto';
                        font-size: 22px;
                        line-height: 100%;
                        color: white;
                        padding-right: 100px;
                        text-align:center">
                <p style="margin-top: 0; margin-bottom: 0">
                    Koordinator Nasional
                </p>
                <p style="margin-top: 0; margin-bottom: 75px" ">
                    Gibran Penerus Jokowi
                </p>
                <p style="margin-top: 0">
                    {{ $kornas_name }}
                </p>
            </div>
            <div
                style="position: absolute;
                        right: 50px;
                        bottom: 125px;
                        padding-right: 100px;
                        text-align:center">
                <img style="width: 135px;" src="{{ $signature }}">
            </div>
        </figure>
    </div>
    <div
        style="margin: 250px;
                    margin-left:33%;
                    width: 752px;
                    height: 1200px;">
        <figure
            style="
                            position: relative;
                            overflow: hidden;
                            width: 100%;
                            height: 100%;
                            margin: 0;
                            background-image: url({{ $back }});
                            background-size: cover;
                            background-repeat: no-repeat">
        </figure>
    </div>
</body>

</html>
