<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificate</title>
    <link rel="stylesheet" href="{{ public_path('admin/css/next.css') }}">

    <style>

        @page { sheet-size: A4-L; }
    </style>
</head>
<body>
    <div class="back">
        <table class="table">
            <tr>
                <td class="blank"></td>
                <td>
                     <img src="{{ public_path('admin/images/OIP (2).jpg') }}" class="image">
                </td>
            </tr>
            <tr>
                <th class="t"></th>
                <th class="text">အနုမောဒနာဂုဏ်ပြုလွှာ</th>
            </tr>
        </table>
        <table>
            <tr>
                {{-- <th class="n"></th> --}}
                <td class="title1">ရှမ်းပြည်နယ်၊ တောင်ကြီးမြို့၊ ပန်းတင်ကျေးရွာအုပ်စု၊ ပညာဗောဒိရိပ်သာလမ်း၊ ဗောဓိတောင်ကုန်း</td>
            </tr>
            <tr>
                {{-- <td class="n"></td> --}}
                <td class="title2">ကျေးဇူးတော်ရှင် ကမ္ဘာ့ဗုဒ္ဓသာသနာပြု အောက်စဖို့ဒ်ဆရာတော် ဦးစီးတည်ထောင် ဖွင့်လှစ်တော်မူသော </td>
            </tr>
            <tr>
                {{-- <td class="n"></td> --}}
                <td class="title3">ရှမ်းပြည်နယ်ဗုဒ္ဓတက္ကသိုလ် အဓွန့်ရှည်တည်တန့်နိုင်ရန်</td>
            </tr>
        </table>
        <table>

            <tr>
                <td class="cer"></td>
                <td class="certificate1">{{$donor->daddress }} နေ</td>
            </tr>
            <tr>
                <td class="cer"></td>
                <td class="certificate2">{{$donor->dname }} မှ</td>
            </tr>

        </table>
        {{-- <div>{{ $certificate }}</div> --}}
        <table>
            @foreach($data as $cer)
            <tr>
                <td class="pro">> {{$cer->pname  }}အတွက် အလှူတော်ငွေ-{{$cer->amount }} ကျပ် </td>
            </tr>
            @endforeach
            <tr>
                <td class="pro">  စုစုပေါင်း အလှူတော်ငွေ-{{ $totalPrice }} ကျပ်လှူဒါန်းပါသည်။</td>
            </tr>
            <tr>
                <td class="pro1">ဤကဲ့သို့ ဗုဒ္ဓမြတ်စွာ သာသနာတော်အတွက် နိဗ္ဗာန်ရည်မှန်း၍ လှူဒါန်းချီးမြှောက်ထောက်ပံ့သည့်အတွက်</td>
            </tr>
            <tr>
                <td class="pro2">ရှမ်းပြည်နယ်ဗုဒ္ဓတက္ကသိုလ်မှ ကျေးဇူးတင် ဝမ်းမြောက်ဝမ်းသာ သာဓုအနုမောဒနာခေါ်ဆို၍</td>
            </tr>
            <tr>
                <td class="pro3">ဤဂုဏ်ပြုမှတ်တမ်းလွှာဖြင့် မှတ်တမ်းတင် ဂုဏ်ပြုအပ်ပါသည်။</td>
            </tr>


        </table>

    </div>
    <div>
        <table>
            <tr>
                <td class="foot">ရှမ်းပြည်နယ်ဗုဒ္ဓတက္ကသိုလ် ဦးစီးတည်ထောင်သူ</td>
            </tr>
             <tr>
                <td class="foot1">အောက်စဖို့ဒ်ဆရာတော် ပါမောက္ခချုပ် ဒေါက်တာဘဒ္ဒန္တ ဓမ္မသာမိ,DPhil (Oxford)</td>
            </tr>
            <tr>
                <td class="foot2">အဂ္ဂမဟာသဒ္ဓမ္မဇောတိကဓဇ၊ အဂ္ဂမဟာဂန္ထဝါစကပဏ္ဍိတ၊ မဟာဓမ္မကထိကဗဟုဇနဟိတရေ</td>
            </tr>
            <tr>
                <td class="foot3">{{$donor->created_at->Format('j-F-Y') }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
