<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
    
                    <div class="card-body">
                        <div class="container mt-2">
                            
                            <h5>Pembayaran Parkir</h5>
                                <!-- Formulir Input -->
                                    <form class="mb-4" wire:submit="cari">
                                            <!-- Input Nomor Plat -->
                                            <input type="text" class="form-control me-2" placeholder="Masukkan nomor plat" wire:model="nomorPlat">  <!-- Tombol Cari -->
                                            <button type="submit" class="btn btn-primary my-3">Cari</button>
                                        
                                    </form>
                                
                        
                                <!-- Tabel Data -->

                                    <hr />
                                    @if($catatan)
                                    {{ $catatan }}
                                    @endif
                                    @if ($parkirDitemukan)
                                    <table class="table">
                                        <tr>
                                            <td>Nomor Plat</td>
                                            <td>:</td>
                                            <td>{{ $noplat }}</td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kendaraan</td>
                                            <td>:</td>
                                            <td>{{ $jeniskendaraanditemukan }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tarif Perjam</td>
                                            <td>:</td>
                                            <td>Rp. {{  number_format($tarifperjam, 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Waktu Masuk</td>
                                            <td>:</td>
                                            <td>{{ $waktumasuk }}</td>
                                        </tr>
                                        <tr>
                                            <td>Waktu Keluar</td>
                                            <td>:</td>
                                            <td>{{ $waktukeluar }}</td>
                                        </tr>
                                        <tr>
                                            <td>Lama Jam</td>
                                            <td>:</td>
                                            <td>{{ $lamajam }}</td>
                                        </tr>
                                        <tr>
                                            <td>Total Biaya</td>
                                            <td>:</td>
                                            <td>Rp. {{  number_format($totalbiaya, 0, ',', '.') }}</td>
                                        </tr>
                                    </table>
                                    <button class="btn btn-primary w-100" wire:click="bayar">Bayar</button>
                                   @endif
                                    <hr />
                                    <table class="table table-bordered">
                                        <thead class="table-light">
                                            <tr>
                                                <th>No</th>
                                                <th>No Plat</th>
                                                <th>Jenis Kendaraan</th>
                                                <th>Tarif Perjam</th>
                                                <th>Waktu Masuk</th>
                                                <th>Waktu Keluar</th>
                                                <th>Durasi</th>
                                                <th>Total Bayar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($riwayatParkir as $rp)
                                                <tr>
                                                    <td>{{ $loop->iteration}}</td>
                                                    <td>{{ $rp->nomor_plat }}</td>                                                   
                                                    <td>{{ $rp->jeniskendaraan->nama }}</td>                                                   
                                                    <td>Rp. {{  number_format($rp->jeniskendaraan->tarif, 0, ',', '.') }}</td>                                                                                               
                                                    <td>{{ $rp->waktu_masuk }}</td>             
                                                    <td>{{ $rp->waktu_keluar }}</td>             
                                                    <td>{{ $rp->durasi }}</td>             
                                                    <td>Rp. {{  number_format($rp->biaya, 0, ',', '.') }}</td>             
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">Belum ada data</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>    
</div>
