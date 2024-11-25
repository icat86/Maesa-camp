<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('admin.header')
    </head>
    <body>
        @include('admin.body')

        <main class="p-10 md:ml-64 h-auto pt-[72px]">
            <!-- Booking Form -->
            <form action="{{ route('admin.checkin.store') }}" method="POST">
                @csrf
                <!-- Section 1: General Information -->
                <h2 class="text-2xl font-bold mb-4 pt-16 pb-2">Booking</h2>

                <div class="grid grid-cols-1 md:grid-cols-1 gap-10">
                    <div>
                        <label class="block text-gray-700">Date Order</label>
                        <input type="text" value="{{ now()->format('Y-m-d') }}" disabled class="w-full p-2 border border-gray-300 rounded-lg">
                        <input type="hidden" name="date_order" value="{{ now()->format('Y-m-d') }}">
                    </div>
                    <div>
                        <label class="block text-gray-700">Order By</label>
                        <input type="text" class="w-full p-2 border border-gray-300 rounded-lg" name="order_by">
                    </div>
                    <div>
                        <label class="block text-gray-700">Cost Code</label>
                        <input type="text" class="w-full p-2 border border-gray-300 rounded-lg" name="cost_code">
                    </div>

                    <div>
                        <label class="block text-gray-700">Person</label>
                        <div class="flex items-center mb-6">
                            <select id="personDropdown" class="w-full p-2 border border-gray-300 rounded-lg">
                                <option value="" disabled selected>-- Choose Person --</option>
                                @foreach($people as $person)
                                    <option value="{{ $person->id }}" 
                                            data-name="{{ $person->name }}" 
                                            data-ktp="{{ $person->ktp_id }}" 
                                            data-gender="{{ $person->gender }}" 
                                            data-company="{{ $person->company }}" 
                                            data-sponsor="{{ $person->sponsor_company }}">
                                        {{ $person->name }}
                                    </option>
                                @endforeach
                            </select>
                            <button id="addPersonBtn" type="button" class="ml-4 bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
                                Add Person
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Dynamic Table -->
                <table class="table-auto w-full border-collapse border border-gray-400" id="selectedPersonsTable">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-gray-400 px-4 py-2">No.</th>
                            <th class="border border-gray-400 px-4 py-2">Name</th>
                            <th class="border border-gray-400 px-4 py-2">KTP/ID</th>
                            <th class="border border-gray-400 px-4 py-2">Gender</th>
                            <th class="border border-gray-400 px-4 py-2">Company</th>
                            <th class="border border-gray-400 px-4 py-2">Sponsor Company</th>
                            <th class="border border-gray-400 px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- akan ditambahkan kesini melalui js --}}
                    </tbody>
                </table>

                <!-- Hidden input for selected persons (for now is useless) -->
                {{-- <input type="hidden" id="selectedPersons" name="selected_persons"> --}}

                <!-- Section 3: Other Requirements -->
                <div class="mt-8">
                    <label class="block text-gray-700">Other Requirements</label>
                    <textarea class="w-full p-2 border border-gray-300 rounded-lg h-32" name="other_requirements"></textarea>
                </div>

                <!-- Section 4: Accommodation Details -->
                <div class="mt-8 bg-white p-5 rounded-lg shadow-lg space-y-4">
                    <h3 class="text-xl font-bold mb-4">Accommodation Details</h3>

                    <!-- Tombol Add Accommodation -->
                    <button type="button" onclick="addAccommodationRow()" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                        Add Accommodation
                    </button>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left table-auto border-collapse border border-gray-300">
                            <thead>
                                <tr>
                                    <th class="border border-gray-300 p-2">Name</th>
                                    <th class="border border-gray-300 p-2">ID</th>
                                    <th class="border border-gray-300 p-2">Date In</th>
                                    <th class="border border-gray-300 p-2">Date Out</th>
                                    <th class="border border-gray-300 p-2">Room Type</th>
                                    <th class="border border-gray-300 p-2">Remarks</th>
                                    <th class="border border-gray-300 p-2">Action</th>
                                </tr>
                            </thead>
                            <tbody id="accommodationTableBody">
                                <tr>
                                    <td>
                                        <select name="person_id[]" class="w-full p-2 border border-gray-300 rounded-lg">
                                            <option value="">Select</option>
                                            @foreach($people as $person)
                                                <option value="{{ $person->id }}">{{ $person->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" name="id[]" class="w-full p-2 border border-gray-300 rounded-lg">
                                    </td>
                                    <td>
                                        <input type="date" name="date_in[]" class="w-full p-2 border border-gray-300 rounded-lg">
                                    </td>
                                    <td>
                                        <input type="date" name="date_out[]" class="w-full p-2 border border-gray-300 rounded-lg">
                                    </td>
                                    <td>
                                        <select name="room_type[]" class="w-full p-2 border border-gray-300 rounded-lg">
                                            <option value="Single">Single</option>
                                            <option value="Double">Double</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" name="remarks[]" class="w-full p-2 border border-gray-300 rounded-lg">
                                    </td>
                                    <td>
                                        <button type="button" onclick="deleteAccommodationRow(this)" class="bg-red-500 text-white px-4 py-1 rounded-lg hover:bg-red-600">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                            
                        </table>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mt-8 text-right">
                    <button class="bg-green-500 text-white px-6 py-2 rounded-lg shadow-md hover:bg-green-600" type="submit">Submit</button>
                </div>
            </form>

            <!-- Script -->
            <script>

                //bagian person
                document.getElementById('addPersonBtn').addEventListener('click', function () {
                    const personDropdown = document.getElementById('personDropdown');
                    const selectedOption = personDropdown.options[personDropdown.selectedIndex];
        
                    if (!selectedOption.value) {
                        alert('Please select a person!');
                        return;
                    }

                    const id = selectedOption.value;
                    const name = selectedOption.getAttribute('data-name');
                    const ktp = selectedOption.getAttribute('data-ktp');
                    const gender = selectedOption.getAttribute('data-gender');
                    const company = selectedOption.getAttribute('data-company');
                    const sponsor = selectedOption.getAttribute('data-sponsor');

                    const tableBody = document.getElementById('selectedPersonsTable').querySelector('tbody');
                    const existingRow = Array.from(tableBody.rows).find(row => row.dataset.id === id);
                    if (existingRow) {
                        alert('This person is already added!');
                        return;
                    }

                    const rowCount = tableBody.rows.length;
                    const row = tableBody.insertRow(rowCount);
                    row.dataset.id = id;

                    row.innerHTML = `
                        <td class="border border-gray-400 px-4 py-2">${rowCount + 1}</td>
                        <td class="border border-gray-400 px-4 py-2">${name}</td>
                        <td class="border border-gray-400 px-4 py-2">${ktp}</td>
                        <td class="border border-gray-400 px-4 py-2">${gender}</td>
                        <td class="border border-gray-400 px-4 py-2">${company}</td>
                        <td class="border border-gray-400 px-4 py-2">${sponsor}</td>
                        <td class="border border-gray-400 px-4 py-2">
                            <button class="bg-red-500 text-white px-4 py-1 rounded-lg hover:bg-red-600" onclick="deleteRow(this)">Delete</button>
                        </td>
                    `;
                    updateHiddenInput();
                });

                function deleteRow(button) {
                    const row = button.parentElement.parentElement;
                    row.remove();
                    const tableBody = document.getElementById('selectedPersonsTable').querySelector('tbody');
                    Array.from(tableBody.rows).forEach((row, index) => {
                        row.cells[0].textContent = index + 1;
                    });
                    updateHiddenInput();
                }

                function updateHiddenInput() {
                    const tableBody = document.getElementById('selectedPersonsTable').querySelector('tbody');
                    const selectedIds = Array.from(tableBody.rows).map(row => row.dataset.id);
                    document.getElementById('selectedPersons').value = JSON.stringify(selectedIds);
                }


                //accommodation part
                function addAccommodationRow() {
                    const tableBody = document.getElementById("accommodationTableBody");
                    const row = tableBody.insertRow();

                    const nameCell = row.insertCell(0);
                    const idCell = row.insertCell(1);
                    const dateInCell = row.insertCell(2);
                    const dateOutCell = row.insertCell(3);
                    const roomTypeCell = row.insertCell(4);
                    const remarksCell = row.insertCell(5);
                    const actionCell = row.insertCell(6);

                    nameCell.innerHTML = `<select class="w-full p-2 border border-gray-300 rounded-lg">
                                            <option value="">Select</option>
                                            @foreach($people as $person)
                                                <option value="{{ $person->id }}">{{ $person->name }}</option>
                                            @endforeach
                                        </select>`;

                    roomTypeCell.innerHTML = `<select class="w-full p-2 border border-gray-300 rounded-lg">
                                               <option value="Single">Single</option>
                                               <option value="Double">Double</option>
                                           </select>`;
                    
                    idCell.innerHTML = `<input type="text" name="id[]" class="w-full p-2 border border-gray-300 rounded-lg">`;
                    dateInCell.innerHTML = `<input type="date" name="date_in[]" class="w-full p-2 border border-gray-300 rounded-lg">`;
                    dateOutCell.innerHTML = `<input type="date" name="date_out[]" class="w-full p-2 border border-gray-300 rounded-lg">`;
                    remarksCell.innerHTML = `<input type="text" name="remarks[]" class="w-full p-2 border border-gray-300 rounded-lg">`;
                    actionCell.innerHTML = `<button type="button" onclick="deleteAccommodationRow(this)" class="bg-red-500 text-white px-4 py-1 rounded-lg hover:bg-red-600">Delete</button>`;
                }

                function deleteAccommodationRow(button) {
                    const row = button.parentElement.parentElement;
                    row.remove();
                }
            </script>
        </main>
    </body>
</html>
