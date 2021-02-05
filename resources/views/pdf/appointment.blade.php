@include('pdf.pdf-header')

<main>
    <table>
        <thead>
        <tr>
            <th class="service">PATIENT NAME</th>
            <th class="desc">DOCTOR NAME</th>
            <th>DATE</th>
            <th>TIME</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="service">{{$details->patient->title .' '.$details->patient->first_name. ' ' .$details->patient->last_name}}</td>
            <td class="desc">{{$details->doctor->title .' '.$details->doctor->first_name. ' ' .$details->doctor->last_name}}</td>
            <td class="unit">{{$details->date}}</td>
            <td class="qty">{{$details->time}}</td>
        </tr>
        </tbody>
    </table>

    <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A appointment valid only selected date.</div>
    </div>
</main>

@include('pdf.pdf-footer')