<div class="table-responsive">

    <table id="upsi" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>UPSI No</th>
                <th>Type Of Sharing</th>
                <th>Date Of Sharing </th>
                <th>End Date </th>
                <th>Period Of Sharing</th>
                <th>Mode Of Sharing</th>
                <th>Confidentiality Agreement</th>
                <th>Effective Date Of Agreement</th>
                
                <th>Description Of Agreement </th>
                <th>Confidentiality Intimation Date</th>
                <th>Purpose Of Sharing</th>
                <th>Information Description</th>
                <th>Remark </th>
                <th>User and Time Stamp</th>
                
                
            </tr>
        </thead>
        <tbody>


            <td>{{$upsi->id}}</td>
            <td>{{$upsi->upsinum}}</td>

            <td>{{$upsi->sharingtype}}</td>
            <td>{{$upsi->dateofshare}}</td>
            <td>{{$upsi->enddate}}</td>

            <td>{{$upsi->periodofshare}}</td>

            <td>{{$upsi->modeofsharing}}</td>
            <td>{{$upsi->confidentiality}}</td>
            
            <td>{{$upsi->effectivedate}}</td>
            <td>{{$upsi->descriptionagreement}}</td>
            <td>{{$upsi->confintimatdate}}</td>
            <td>{{$upsi->purpose}}</td>

            <td>{{$upsi->descriptioninfo}}</td>
            <td>{{$upsi->remark}}</td>
            <td>{{$upsi->dsctime}}</td>
            
            


        </tr>

    </tbody>
    <tfoot>
        <!-- <tr>
            <th>Id</th>
            <th>UpsiNumber</th>

            <th>Type Of Sharing</th>
            <th>Date Of Sharing </th>
            <th>Period Of Sharing</th>
            <th>Mode Of Sharing</th>
            <th>Confidentiality Agreement</th>
            <th>Effective Date Of Agreement</th>
            <th>Purpose</th>
            <th>Description Of Agreement </th>
            <th>Confidentiality Intimation Date</th>
            <th>Purpose Of Sharing</th>
            <th>Information Description</th>
            <th>Remark </th>
            <th>DSC Time Stamping</th>
            <th>Status</th>
            
        </tr> -->
    </tfoot>
</table>
</div>
</div>


