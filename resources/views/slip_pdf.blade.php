<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Acknowledgement Slip PDF</title>
    <style>
        @page { margin: 18px; }
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; color:#000; }

        .page { border: 1px solid #000; padding: 14px; }
        .title { text-align:center; }
        .title h2 { margin:0; font-size:18px; }
        .title h3 { margin:6px 0 0; font-size:14px; font-weight:700; }

        .box { border:1px solid #000; padding:6px 10px; display:inline-block; font-weight:700; }
        .label { font-weight:700; width:110px; display:inline-block; }

        table { border-collapse: collapse; width:100%; }
        .layout td { vertical-align: top; }

        .photoBox { width:120px; height:140px; border:1px solid #000; }
        .photoBox img { width:120px; height:140px; }

        .digitTable td{
            width:24px; height:24px;
            border:1px solid #000;
            text-align:center; vertical-align:middle;
            font-weight:700;
        }

        .t1 th, .t1 td, .t2 th, .t2 td { border:1px solid #000; padding:6px 8px; }
        .t1 th, .t2 th { background:#f2f2f2; text-align:center; }

        .center { text-align:center; }
        .note { border:1px solid #000; padding:10px; margin-top:14px; text-align:center; }
    </style>
</head>
<body>
<div class="page">

    <div class="title">
        <h2>Undergraduate Admission 2021-22</h2>
        <h3>Acknowledgement Slip</h3>
    </div>

    {{-- Top Layout: UNIT | GST ROLL | PHOTO --}}
    <table class="layout" style="margin-top:12px;">
        <tr>
            <td style="width:25%;">
                <span class="box">UNIT {{ $unit }}</span>
            </td>

            <td style="width:50%;">
                <table style="width:auto;">
                    <tr>
                        <td style="font-weight:700; padding-right:8px;">GST ROLL:</td>
                        <td>
                            <table class="digitTable" style="width:auto;">
                                <tr>
                                    @foreach(str_split($gst_roll) as $d)
                                        <td>{{ $d }}</td>
                                    @endforeach
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>

            <td style="width:25%; text-align:right;">
                <div class="photoBox">
                    @php
                        $imgData = '';
                        if (file_exists($photo_path)) {
                            $type = pathinfo($photo_path, PATHINFO_EXTENSION);
                            $data = file_get_contents($photo_path);
                            $imgData = 'data:image/' . $type . ';base64,' . base64_encode($data);
                        }
                    @endphp
                    @if($imgData)
                        <img src="{{ $imgData }}" alt="photo">
                    @endif
                </div>
            </td>
        </tr>
    </table>

    {{-- Candidate Info --}}
    <div style="margin-top:12px; line-height:1.7;">
        <div><span class="label">Candidate</span>: {{ $candidate['name'] }}</div>
        <div><span class="label">Father</span>: {{ $candidate['father'] }}</div>
        <div><span class="label">Mother</span>: {{ $candidate['mother'] }}</div>
        <div><span class="label">Quota</span>: {{ $candidate['quota'] }}</div>
        <div><span class="label">Last Modified</span>: {{ $candidate['last_modified'] }}</div>
    </div>

    {{-- Fees --}}
    <table class="t1" style="margin-top:14px;">
        <tr>
            <th style="width:30%"></th>
            <th style="width:35%">Bill No.</th>
            <th style="width:35%">Amount</th>
        </tr>
        @foreach($fees as $f)
            <tr>
                <td class="center"><b>{{ $f['status'] }}</b></td>
                <td class="center">{{ $f['bill_no'] }}</td>
                <td class="center">{{ $f['amount'] }}</td>
            </tr>
        @endforeach
    </table>

    <div style="text-align:center; font-weight:700; margin-top:14px;">
        Subject Choice Order
    </div>

    {{-- Subjects --}}
    <table class="t2" style="margin-top:8px;">
        <tr>
            <th>Subject</th>
            <th style="width:120px;">Choice</th>
        </tr>
        @foreach($subject_choices as $s)
            <tr>
                <td>{{ $s['subject'] }}</td>
                <td class="center">{{ $s['choice'] }}</td>
            </tr>
        @endforeach
    </table>

    <div class="note">
        Pay your bill using DBBL Mobile banking (Rocket). Please visit "Payment instruction" page on the website for detail instruction.
    </div>

</div>
</body>
</html>
