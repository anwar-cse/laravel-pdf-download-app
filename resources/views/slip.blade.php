<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Acknowledgement Slip</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        .page { width: 800px; margin: 20px auto; border: 1px solid #000; padding: 18px; }
        .top-title { text-align: center; line-height: 1.2; }
        .top-title h2 { margin: 0; font-size: 18px; }
        .top-title h3 { margin: 6px 0 0; font-size: 14px; font-weight: 700; }

        .row { display: flex; justify-content: space-between; align-items: flex-start; margin-top: 12px; }
        .box { border: 1px solid #000; padding: 6px 10px; display: inline-block; min-width: 80px; }
        .gst { display: inline-flex; gap: 6px; align-items: center; }
        .gst .digits { display: inline-flex; }
        .gst .digit { width: 24px; height: 24px; border: 1px solid #000; display:flex; align-items:center; justify-content:center; font-weight:700; }

        .info { margin-top: 12px; }
        .info b { display: inline-block; width: 110px; }

        .photo { width: 120px; height: 140px; border: 1px solid #000; overflow: hidden; }
        .photo img { width: 100%; height: 100%; object-fit: cover; }

        table { width: 100%; border-collapse: collapse; margin-top: 14px; }
        th, td { border: 1px solid #000; padding: 6px 8px; }
        th { background: #f2f2f2; text-align: center; }
        .center { text-align: center; }
        .footer-note { border: 1px solid #000; padding: 10px; margin-top: 14px; text-align: center; }

        .actions { width: 800px; margin: 12px auto; display:flex; justify-content:flex-end; gap:10px; }
        .btn { padding: 8px 12px; background:#111; color:#fff; text-decoration:none; border-radius:6px; }
    </style>
</head>
<body>

<div class="actions">
    <a class="btn" href="{{ route('slip.pdf') }}">Download PDF</a>
</div>

<div class="page">
    <div class="top-title">
        <h2>Undergraduate Admission 2021-22</h2>
        <h3>Acknowledgement Slip</h3>
    </div>

    <div class="row">
        <div>
            <div class="box"><b>UNIT</b> {{ $unit }}</div>
        </div>

        <div class="gst">
            <b>GST ROLL:</b>
            <div class="digits">
                @foreach(str_split($gst_roll) as $d)
                    <div class="digit">{{ $d }}</div>
                @endforeach
            </div>
        </div>

        <div class="photo">
            @if(file_exists($photo_path))
                <img src="{{ asset('images/photo.jpg') }}" alt="photo">
            @endif
        </div>
    </div>

    <div class="info">
        <div><b>Candidate</b>: {{ $candidate['name'] }}</div>
        <div><b>Father</b>: {{ $candidate['father'] }}</div>
        <div><b>Mother</b>: {{ $candidate['mother'] }}</div>
        <div><b>Quota</b>: {{ $candidate['quota'] }}</div>
        <div><b>Last Modified</b>: {{ $candidate['last_modified'] }}</div>
    </div>

    <table>
        <tr>
            <th style="width: 30%"></th>
            <th style="width: 35%">Bill No.</th>
            <th style="width: 35%">Amount</th>
        </tr>
        @foreach($fees as $f)
            <tr>
                <td class="center"><b>{{ $f['status'] }}</b></td>
                <td class="center">{{ $f['bill_no'] }}</td>
                <td class="center">{{ $f['amount'] }}</td>
            </tr>
        @endforeach
    </table>

    <div style="text-align:center; font-weight:700; margin-top: 14px;">Subject Choice Order</div>

    <table>
        <tr>
            <th>Subject</th>
            <th style="width: 120px;">Choice</th>
        </tr>
        @foreach($subject_choices as $s)
            <tr>
                <td>{{ $s['subject'] }}</td>
                <td class="center">{{ $s['choice'] }}</td>
            </tr>
        @endforeach
    </table>

    <div class="footer-note">
        Pay your bill using DBBL Mobile banking (Rocket). Please visit "Payment instruction" page on the website for detail instruction.
    </div>
</div>

</body>
</html>
