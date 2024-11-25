<!-- Sale & Revenue Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-6">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-car fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Cars</p>
                    <h6 class="mb-0">{{$mobil}}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-6">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-money-check-alt fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Transactions</p>
                    <h6 class="mb-0">@rupiah($transaksi)</h6>
                </div>
            </div>
        </div>
    </div>
</div>

@livewire('TransaksiComponent')
<!-- Sale & Revenue End -->



