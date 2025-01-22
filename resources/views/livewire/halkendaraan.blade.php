<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
    
                    <div class="card-body">
                        <div class="container mt-1">
                            <div class="row">
                                <!-- Formulir Input -->
                                
                                    <form wire:submit="simpan">
                                        <div class="mb-3">
                                            <label for="jenisKendaraan" class="form-label">Jenis Kendaraan</label>
                                            <input type="text" id="jenisKendaraan" class="form-control" wire:model="jenisKendaraan" placeholder="Masukkan jenis kendaraan">
                                            @error('jenisKendaraan') 
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="tarifPerJam" class="form-label">Tarif Per Jam</label>
                                            <input type="number" id="tarifPerJam" class="form-control" wire:model="tarifPerJam" placeholder="Masukkan tarif per jam">
                                            @error('tarifPerJam') 
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </form>
                                
                        
                                <!-- Tabel Data -->
                                
                                    <h5 class="mt-2">Daftar Kendaraan dan Tarif</h5>
                                    <hr />
                                    <table class="table table-bordered">
                                        <thead class="table-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Jenis Kendaraan</th>
                                                <th>Tarif Per Jam</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($parkingRates as $index => $rate)
                                                <tr>
                                                    <td>{{ $index + 1}}</td>
                                                    <td>{{ $rate['nama'] }}</td>
                                                    <td>Rp {{ number_format($rate['tarif'], 0, ',', '.') }}</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-warning" wire:click="edit({{ $rate['id'] }})">Edit</button>
                                                        <button class="btn btn-sm btn-danger" wire:click="delete({{ $rate['id'] }})">Hapus</button>
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
