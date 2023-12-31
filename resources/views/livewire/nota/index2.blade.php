@section('meta_title', 'NOTA OBAT')
@section('page_title', 'DATA NOTA OBAT')
@section('page_title_icon')
<i class="metismenu-icon fa fa-user"></i>
@endsection
<div class="row">
    <div class="col-12">
        <div class="mb-3 card">
            <div class="card-body">
                <div class="row">
                    <!-- <div class="col-md-6 col-sm-12">
                        <a href="{{ route('user.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah
                            Data</a>
                        </div> -->
                        <div class="col-md-6 col-sm-12">
                            <div class="input-group">
                                <input type="text" class="form-control form-control" wire:model.lazy="search"
                                placeholder="{{ __('Cari Nota Obat') }}" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-default">
                                        <a wire:target="search" wire:loading.remove><i class="fa fa-search"></i></a>
                                        <a wire:loading wire:target="search"><i class="fas fa-spinner fa-spin"></i></a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <table class="mb-0 table table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Tanggal Periksa</th>
                                        <th>Jumlah Pembayaran</th>
                                        <th>Obat</th>
                                        <th>Dokter</th>
                                        <th>Layanan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transaction as $transaction)
                                    <livewire:user.single1 :user="$transaction" :key="time() . $transaction->id" />
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="m-auto pt-3 pr-3">
                        {{ $transaction->appends(request()->query())->links() }}
                    </div>
                    <div wire:loading wire:target="nextPage,gotoPage,previousPage" class="loader-page"></div>
                </div>
            </div>
        </div>
    </div>
