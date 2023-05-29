<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>View</title>
<link rel="stylesheet" href="{{ public_path('admin/css/index.css') }}">
</head>
<body>
    <div class="nav">
        <table class="color">
            <tr >
                <th class="img">
                        <img src="{{ public_path('admin/images/logo.jpg') }}" class="image">
                </th>
                <th class="mlogo">
                        <h2 class="logo" >Shan State Buddhist University</h2>
                        <h2 class="logo1">ရှမ်းပြည်နယ် ဗုဒ္ဓတက္ကသိုလ်</h2>
                        <tr>
                            <td class="blank"> </td>
                            <td class="b">Donation Receipt</td>
                            <td class="b">အလှူတော်ငွေပြေစာ</td>
                        </tr>

                </th>

            </tr>

        </table>

    </div>

    <div>
        <table>
            <tr>
                <th></th>
            </tr>
            <tr>
                <th></th>
            </tr>

            <tr>
                <th class="size"></th>
                <th class="size"></th>
                <th class="date">Date</th>
                <th class="date">{{ $users->created_at->format('j/F/Y') }}</th>
            </tr>
            <tr>
                <th></th>
            </tr>
            <tr>
                <th></th>
            </tr>
            <tr>
                <td class="left">Name/အမည်</td>
                <td class="right">{{  $users->dname }}</td>
            </tr>
            <tr>
                <td class="left">Address/လိပ်စာ</td>
                <td class="right">{{  $users->daddress }}</td>
            </tr>
            <tr>
                <td class="left">Amount/အလှူငွေ</td>
                <td class="right">{{  $users->amount }}</td>
            </tr>
            <tr>
                <td class="left">For/မှတ်ချက်</td>
                <td class="right">{{  $users->pname }}</td>
            </tr>
            {{-- <tr>
                <td class="left">Detail/အသေးစိတ်</td>
                <td class="right">{{  $users->title }}</td>
            </tr> --}}
            {{-- <tr>
                <td class="left">Category/အလှူပဒေသာပင်</td>
                <td class="right">{{  $users->type_of_donation }}</td>
            </tr> --}}
        </table>
        <table>
            <tr>

                <td class="type">လောကဓမ္မနှစ်ဖြာ အောင်မြင်ကြီးပွားတိုးတက်ပါစေ</td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="first">{{  $users->dreceiver }}</td>
                <td class="foot"></td>
                <td class="first"></td>
            </tr>
            <tr>
                <td class="R">Received By/ငွေလက်ခံသူ</td>
                <td class="foot"></td>
                <td class="R">Signature/လက်မှတ်</td>
            </tr>
        </table>

    </div>

</body>
</html>

