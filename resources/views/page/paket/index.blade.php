<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('PAKET') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4">
                    <div>DATA PAKET</div>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100 flex gap-5">
                    {{-- FORM ADD PAKET --}}
                    <div class="w-full bg-gray-100 p-4 rounded-xl">
                        <div class="mb-5">
                            INPUT DATA PAKET
                        </div>
                        <form action="{{ route('paket.store') }}" method="post">
                            @csrf
                            <div class="mb-5">
                                <label for="id_outlet"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Outlet</label>
                                <select class="js-example-placeholder-single js-states form-control w-full"
                                    name="id_outlet" id="id_outlet" placeholder="Pilih Outlet">
                                    <option value="" disabled selected>Pilih...</option>
                                    @foreach ($outlet as $k)
                                        <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-5">
                                <label for="base-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis</label>
                                <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                    name="jenis" data-placeholder="Pilih Jenis">
                                    <option value="">Pilih...</option>
                                    <option value="Baju">Baju</option>
                                    <option value="Hoodie">Hoodie</option>
                                    <option value="Sprei">Sprei</option>
                                    <option value="Karpet">Karpet</option>
                                    <option value="Selimut">Selimut</option>
                                </select>
                            </div> 
                            <div class="mb-5">
                                <label for="base-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                    Paket</label>
                                <input name="nama_paket" type="text" id="base-input"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukan nama paket...">
                            </div>
                            <div class="mb-5">
                                <label for="base-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                                <input name="harga" type="number" id="base-input"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukan Harga disini..." required>
                            </div>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">SIMPAN</button>
                        </form>
                    </div>
                    {{-- TABLE PAKET --}}
                    <div class="w-full">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            NO
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            OUTLET
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            JENIS
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            NAMA PAKET
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            HARGA
                                        </th>
                                        <th scope="col" class="px-6 py-3">

                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($paket as $key => $k)
                                        <tr
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $paket->perPage() * ($paket->currentPage() - 1) + $key + 1 }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $k->outlet->nama }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $k->jenis }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $k->nama_paket }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $k->harga }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <button type="button" data-id="{{ $k->id }}"
                                                    data-modal-target="sourceModal"
                                                    data-id_outlet="{{ $k->id_outlet }}"
                                                    data-jenis="{{ $k->jenis }}" 
                                                    data-nama_paket="{{ $k->nama_paket }}"
                                                    data-harga="{{ $k->harga }}" onclick="editSourceModal(this)"
                                                    class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white">
                                                    Edit
                                                </button>
                                                <button
                                                    onclick="return paketDelete('{{ $k->id }}','{{ $k->outlet->nama }}')"
                                                    class="bg-red-500 hover:bg-bg-red-300 px-3 py-1 rounded-md text-xs text-white">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $paket->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModal">
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <div class="fixed inset-0 flex items-center justify-center">
            <div class="w-full md:w-1/2 relative bg-white rounded-lg shadow mx-5">
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900" id="title_source">
                        Update Sumber Database
                    </h3>
                    <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModal"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="defaultModal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form method="POST" id="formSourceModal">
                    @csrf
                    <div class="flex flex-col  p-4 space-y-6">
                        <div class="">
                            <label for="id_outlet_edit"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Outlet</label>
                            <select class="js-example-placeholder-single js-states form-control w-full"
                                name="id_outlet_edit" id="id_outlet" data-placeholder="Pilih Outlet">
                                <option value="" disabled selected>Pilih...</option>
                                @foreach ($outlet as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="">
                            <label for="jenis"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                            </label>
                            <select class="js-example-placeholder-single js-states form-control w-full" name="jenis"
                                id="jenis" data-placeholder="Pilih Jenis">
                                <option value="" disabled selected>Pilih...</option>
                                <option value="BAJU">BAJU</option>
                                <option value="HOODIE">HOODIE</option>
                                <option value="SPREI">SPREI</option>
                                <option value="KARPET">KARPET</option>
                                <option value="SELIMUT">SELIMUT</option>
                            </select>
                        </div>
                        <div class="">
                            <label for="nama_paket"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Paket</label>
                            <input name="nama_paket" type="text" id="nama_paket"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="">
                            <label for="harga" class="block mb-2 text-sm font-medium text-gray-900">Harga</label>
                            <input type="text" id="harga" name="harga" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Nama Paket disini...">
                        </div>
                    </div>
                    <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                        <button type="submit" id="formSourceButton"
                            class="bg-green-400 m-2 w-40 h-10 rounded-xl hover:bg-green-500">Simpan</button>
                        <button type="button" data-modal-target="sourceModal" onclick="sourceModalClose(this)"
                            class="bg-red-500 m-2 w-40 h-10 rounded-xl text-white hover:shadow-lg hover:bg-red-600">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
<script>
        const editSourceModal = (button) => {
        const formModal = document.getElementById('formSourceModal');
        const modalTarget = button.dataset.modalTarget;
        const id = button.dataset.id;
        const id_outlet = button.dataset.id_outlet;
        const jenis = button.dataset.jenis;
        const nama_paket = button.dataset.nama_paket;
        const harga = button.dataset.harga;

        let url = "{{ route('paket.update', ':id') }}".replace(':id', id);

        let status = document.getElementById(modalTarget);
        document.getElementById('title_source').innerText = `UPDATE PAKET ${nama_paket}`;

        // document.getElementById('id_outlet').value = id_outlet;
        let event = new Event('change');

        document.querySelector('[name="id_outlet_edit"]').value = id_outlet;
        document.querySelector('[name="id_outlet_edit"]').dispatchEvent(event);

        document.getElementById('nama_paket').value = nama_paket;
        document.getElementById('jenis').value = jenis;
        document.getElementById('harga').value = harga;

        document.getElementById('formSourceButton').innerText = 'Simpan';
        document.getElementById('formSourceModal').setAttribute('action', url);
        let csrfToken = document.createElement('input');
        csrfToken.setAttribute('type', 'hidden');
        csrfToken.setAttribute('value', '{{ csrf_token() }}');
        formModal.appendChild(csrfToken);

        let methodInput = document.createElement('input');
        methodInput.setAttribute('type', 'hidden');
        methodInput.setAttribute('name', '_method');
        methodInput.setAttribute('value', 'PATCH');
        formModal.appendChild(methodInput);

        status.classList.toggle('hidden');
    }

    const sourceModalClose = (button) => {
        const modalTarget = button.dataset.modalTarget;
        let status = document.getElementById(modalTarget);
        status.classList.toggle('hidden');
    }

    const paketDelete = async (id, paket) => {
        let tanya = confirm(`Apakah anda yakin untuk menghapus Paket ${paket} ?`);
        if (tanya) {
            try {
                const response = await axios.post(`/paket/${id}`, {
                    '_method': 'DELETE',
                    '_token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                });

                if (response.status === 200) {
                    alert('paket berhasil dihapus');
                    location.reload();
                } else {
                    alert('Gagal menghapus paket. Silakan coba lagi.');
                }
            } catch (error) {
                console.error(error);
                alert('Terjadi kesalahan saat menghapus paket. Silakan cek konsol untuk detail.');
            }
        }
    };
</script>
