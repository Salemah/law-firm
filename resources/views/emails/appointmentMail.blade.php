<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARC</title>
</head>

<body bgcolor="#0f3462" style="margin-top:20px;margin-bottom:20px">
    <!-- Main table -->
    <table border="0" align="center" cellspacing="0" cellpadding="0" bgcolor="white" width="650">
        <tr>
            <td>
                <!-- Child table -->
                <table border="0" cellspacing="0" cellpadding="0" style="color:#0f3462; font-family: sans-serif;">
                    <tr>
                        <td>
                            <h2 style="text-align:center; margin: 0px; padding-bottom: 25px; margin-top: 25px;">
                                <span style="color:lightcoral">ARC</span>
                            </h2>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="https://i.ibb.co/fYv8Ggz/1702392218arc-01.jpg" height="50px"
                                style="display:block; margin:auto;padding-bottom: 25px; ">
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">
                            <h1 style="margin: 0px;padding-bottom: 25px; text-transform: uppercase;">Appointment
                                Confirmation</h1>
                            <h2 style="margin: 0px;padding-bottom: 25px;font-size:22px;"> Please
                                be present on time</h2>
                            <p style=" margin: 0px 40px;padding-bottom: 25px;line-height: 2; font-size: 15px;">
                                Consultant :{{ $mailData['team'] }}
                            </p>
                            <p style=" margin: 0px 40px;padding-bottom: 25px;line-height: 2; font-size: 15px;">
                                Appointment Time :{{ $mailData['slot'] }}
                            </p>
                            <p style=" margin: 0px 32px;padding-bottom: 25px;line-height: 2; font-size: 15px;">Your
                                Message :{{ $mailData['message'] }}
                            </p>
                            <p style=" margin: 0px 32px;padding-bottom: 25px;line-height: 2; font-size: 15px;width:80vh">
                            </p>
                            <h2 style="margin: 0px; padding-bottom: 25px;">Date: {{ $mailData['date'] }}</h2>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="button"
                                style="background-color:#36b445; color:white; padding:15px 97px; outline: none; display: block; margin: auto; border-radius: 31px;
                                font-weight: bold; margin-top: 25px; margin-bottom: 25px; border: none; text-transform:uppercase; "><a
                                    href="">Join</a></button>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <h2 style="padding-top: 25px; line-height: 1; margin:0px;">Google Meet Code:</h2>
                            <div style="margin-bottom: 25px; font-size: 15px;margin-top:7px;">1800
                            </div>
                        </td>
                    </tr>

                </table>
                <table align="center" width="35%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr >
                            <td align="center" width="30%" style="vertical-align: top;">
                                <a href="{{ $mailData['facebook'] }}" target="_blank"> <img
                                        src="https://i.ibb.co/DVn1WKb/images.png" style="width: 50px;"> </a>
                            </td>

                            <td align="center" class="margin" width="30%" style="vertical-align: top;">
                                <a href="{{ $mailData['twitter'] }}" target="_blank"> <img
                                        src="https://i.ibb.co/DVn1WKb/images.png" style="width: 50px;"> </a>
                            </td>

                            <td align="center" width="30%" style="vertical-align: top;">
                                <a href="{{ $mailData['linkedin'] }}" target="_blank"> <img
                                        src="https://i.ibb.co/DVn1WKb/images.png" style="width: 50px;"> </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- /Child table -->
            </td>
        </tr>
    </table>
    <!-- / Main table -->
</body>

</html>
