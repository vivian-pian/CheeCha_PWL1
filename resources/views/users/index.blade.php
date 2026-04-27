<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cheecha Customer Management') }}
        </h2>
    </x-slot>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                
                <div class="d-flex justify-content-between mb-4">
                    <h4 class="mb-0">Customer List</h4>
                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalTambah">
                        + Add Customer
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead class="table-light">
                            <tr>
                                <th class="py-3">No</th> 
                                <th class="py-3">Name</th>
                                <th class="py-3">Email</th>
                                <th class="py-3">Phone</th>
                                <th class="py-3">Address</th>
                                <th class="py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pelanggan as $item)
                            <tr>
                                <td class="py-3">{{ $loop->iteration }}</td>
                                <td class="py-3">{{ $item->nama_pelanggan }}</td>
                                <td class="py-3">{{ $item->email_pelanggan }}</td>
                                <td class="py-3">+62 {{ ltrim($item->nomor_telepon_pelanggan, '0') }}</td>
                                <td class="py-3">{{ $item->alamat_pengguna }}</td>
                                <td class="py-3">
                                    <a href="{{ route('user.edit', $item->id_pelanggan) }}" class="text-primary text-decoration-none me-3">Edit</a>
    
                                    <form action="{{ route('user.destroy', $item->id_pelanggan) }}" method="POST" class="d-inline">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="text-danger border-0 bg-transparent p-0" onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('user.store') }}" method="POST" class="modal-content">
                @csrf
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Add New Customer</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Customer Name</label>
                        <input type="text" name="nama_pelanggan" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email_pelanggan" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="number" name="nomor_telepon_pelanggan" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Full Address</label>
                        <textarea name="alamat_pengguna" class="form-control" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Data</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</x-app-layout>