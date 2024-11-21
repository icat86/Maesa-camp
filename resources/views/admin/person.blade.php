<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('admin.header')
    </head>
    <body>
        @include('admin.body')

            {{-- content inside --}}
            <main class="p-10 md:ml-64 h-auto pt-[72px]">
                <p class="text-left text-2xl font-bold pt-16 pb-2">Employee</p>

                <div class="flex justify-between items-center pb-4">
                    <!-- Search Bar -->
                    <div>
                        <input type="text" placeholder="Search" class="border rounded py-2 px-4">
                    </div>
                    <!-- Add New Person Button -->
                    <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded flex items-center" type="button" data-bs-toggle="modal" data-bs-target="#emplyModal">
                        <span class="mr-2">Add New Person</span>
                        <span class="text-white text-xl">+</span>
                    </button>
                </div>
    
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="min-w-full bg-white border">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="text-left py-3 px-4">#</th>
                                <th class="text-left py-3 px-4">ID</th>
                                <th class="text-left py-3 px-4">Name</th>
                                <th class="text-left py-3 px-4">Gender</th>
                                <th class="text-left py-3 px-4">Company</th>
                                <th class="text-left py-3 px-4">Sponsor Company</th>
                                <th class="text-center py-3 px-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($people as $index => $employe)
                                <tr class="border-b">
                                <td class="py-3 px-4">{{ $index + 1 }}</td>
                                <td class="py-3 px-4">{{ $employe->ktp_id }}</td>
                                <td class="py-3 px-4">{{ $employe->name }}</td>
                                <td class="py-3 px-4">{{ $employe->gender }}</td>
                                <td class="py-3 px-4">{{ $employe->company }}</td>
                                <td class="py-3 px-4">{{ $employe->sponsor_company }}</td>
                                {{-- <td class="py-3 px-4">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $room->status_class }}">
                                        {{ $room->status }}
                                    </span>
                                </td> --}}
                                <td class="py-2 px-4 flex space-x-2">
                                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-3 rounded" type="button" data-bs-toggle="modal" data-bs-target="#editEmployeeModal"
                                    onclick="openEditModal({{ $employe->id }}, '{{ $employe->name }}', '{{ $employe->ktp_id }}', '{{ $employe->company }}', '{{ $employe->sponsor_company }}', '{{ $employe->gender }}')">
                                        Manage
                                    </button>
                                    <form action="{{ route('person.destroy', $employe->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this person?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            @endforeach
                        </tbody>
                    </table>
                </div>    
                
                <!-- add person. Modal form -->
                <div class="modal fade" id="emplyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Person</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('person.store') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="tname" placeholder="Enter Name">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">KTP/ID</label>
                                        <input type="text" class="form-control" name="tid">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Company</label>
                                        <input type="text" class="form-control" name="tcompany">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Sponsor Company</label>
                                        <input type="text" class="form-control" name="tcompanysponsor">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Gender</label>
                                        <div class="form-check ml-2">
                                            <input class="form-check-input" type="radio" name="tgender" value="Male" checked>
                                            <label class="form-check-label">Male</label>
                                        </div>
                                        <div class="form-check ml-2">
                                            <input class="form-check-input" type="radio" name="tgender" value="Female">
                                            <label class="form-check-label">Female</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- edit person. Modal form -->
                <div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="editEmployeeLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form id="editEmployeeForm" action="{{ route('person.update', $employe->id) }}" method="POST">
                                @csrf
                                @method('PUT') <!-- For Laravel's PUT request -->
                                <input type="hidden" name="id" id="editEmployeeId">
                                
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editEmployeeLabel">Edit Person</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Name Field -->
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" id="editEmployeeName" required>
                                    </div>
                                    <!-- Other fields like KTP/ID, Company, Sponsor, Gender, etc. -->
                                    <div class="mb-3">
                                        <label class="form-label">KTP/ID</label>
                                        <input type="text" class="form-control" name="ktp_id" id="editEmployeeKtpId">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Company</label>
                                        <input type="text" class="form-control" name="company" id="editEmployeeCompany">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Sponsor Company</label>
                                        <input type="text" class="form-control" name="sponsor_company" id="editEmployeeSponsor">
                                    </div>
                                    <!-- Gender Radio Buttons -->
                                    <div class="mb-3">
                                        <label class="form-label">Gender</label>
                                        <div>
                                            <input class="form-check-input" type="radio" name="gender" value="Male" id="editGenderMale">
                                            <label class="form-check-label">Male</label>
                                            <input class="form-check-input" type="radio" name="gender" value="Female" id="editGenderFemale">
                                            <label class="form-check-label">Female</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>

                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                

            </main>
    </body>
</html>