
<div class="card shadow mb-4">
    <div class="card-header py-auto d-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Accomplishment Report</h6>
        <a href="#" class="btn btn-primary">Add Report</a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center" width="100%" cellspacing="0">
                <thead>
                    <tr class="table-warning ">
                        <th rowspan="3">Particulars</th>
                        <th rowspan="3">Quarters</th>
                        <th colspan="12">Physical Target by Campus C.Y. <br>2023 </th>
                    </tr>
                    <tr class="table-success ">
                        <th colspan="7">EVSU – MAIN CAMPUS</th>
                        <th rowspan="2">EVSU – Burauen Campus</th>
                        <th rowspan="2">EVSU – Carigara Campus</th>
                        <th rowspan="2">EVSU – Ormoc City Campus</th>
                        <th rowspan="2">EVSU – Tanauan Campus</th>
                        <th rowspan="2">EVSU – Dulag Campus</th>
                    </tr>
                    <tr class="table-secondary ">
                        <th>CAAD</th>
                        <th>CAS</th>
                        <th>COBE</th>
                        <th>COE</th>
                        <th>COED</th>
                        <th>COT</th>
                        <th>GS</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($reports as $particular_id => $particularData)

                        @php $firstParticular = true; @endphp
                        @php $sortedQuarterData = collect($particularData)->sortBy('quarter_id'); @endphp

                        @foreach ($sortedQuarterData as $quarter_id => $quarterData)
                            <tr>
                                @if ($firstParticular)
                                    <td rowspan="{{ count($particularData) }}">{{ $particular_id }}</td>
                                    @php $firstParticular = false; @endphp
                                @endif
                                <td>{{ $quarter_id }}</td>

                                <td>{{ $quarterData[9]['count'] ?? '' }}</td>
                                <td>{{ $quarterData[10]['count'] ?? ''}}</td>
                                <td>{{ $quarterData[11]['count'] ?? ''}}</td>
                                <td>{{ $quarterData[12]['count'] ?? ''}}</td>
                                <td>{{ $quarterData[13]['count'] ?? ''}}</td>
                                <td>{{ $quarterData[14]['count'] ?? ''}}</td>
                                <td>{{ $quarterData[15]['count'] ?? ''}}</td>
                                <td>{{ $quarterData[16]['count'] ?? ''}}</td>
                                <td>{{ $quarterData[17]['count'] ?? ''}}</td>
                                <td>{{ $quarterData[18]['count'] ?? ''}}</td>
                                <td>{{ $quarterData[19]['count'] ?? ''}}</td>
                                <td>{{ $quarterData[20]['count'] ?? ''}}</td>
                            </tr>
                        @endforeach
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>