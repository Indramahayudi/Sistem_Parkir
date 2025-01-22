<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
    
                    <div class="card-body">
                        
                      
                        <div class="container mt-2">
                            <h5>Input Parkir</h5>
                            <div class="row">
                                <!-- Formulir Input -->
                                
                                    <form wire:submit="simpan">
                                        <!-- Input Nomor Plat -->
                                        <div class="mb-3">
                                            <label for="nomorPlat" class="form-label">Nomor Plat</label>
                                            <input type="text" id="nomorPlat" class="form-control" wire:model="nomorPlat" placeholder="Masukkan nomor plat">
                                            @error('nomorPlat') 
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    
                                        <!-- Select Jenis Kendaraan -->
                                        <div class="mb-3">
                                            <label for="jenisKendaraan" class="form-label">Jenis Kendaraan</label>
                                            <select id="jenisKendaraan" class="form-select" wire:model="jenisKendaraan">
                                                <option value="" selected>Pilih jenis kendaraan</option>
                                                @foreach($jenisKendaraanOptions as $option)
                                                    <option value="{{ $option->id }}">{{ $option->nama }} - Rp {{ number_format($option->tarif, 0, ',', '.')}}</option>
                                                @endforeach
                                            </select>
                                            @error('jenisKendaraan') 
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    
                                        <!-- Tombol Submit -->
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </form>
                                
                        
                                <!-- Tabel Data -->
                                    <h5>Daftar Kendaraan dan Tarif</h5>
                                    <hr />
                                    <table class="table table-bordered">
                                        <thead class="table-light">
                                            <tr>
                                                <th>No</th>
                                                <th>No Plat</th>
                                                <th>Jenis Kendaraan</th>
                                                <th>Tarif Perjam</th>
                                                <th>Waktu Masuk</th>
                                                <th>Aksi</th>
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
                                                    <td>
                                                        <button class="btn btn-sm btn-warning" wire:click="edit({{ $rp['id'] }})">Edit</button>
                                                        <button class="btn btn-sm btn-danger" wire:click="delete({{ $rp['id'] }})">Hapus</button>
                                                    </td>
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
</div>
