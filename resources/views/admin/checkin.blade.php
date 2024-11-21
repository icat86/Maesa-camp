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
                        <input type="text" value="//automatic" disabled class="w-full p-2 border border-gray-300 rounded-lg">
                    </div>
                    <div>
                        <label class="block text-gray-700">Order By</label>
                        <input type="text" class="w-full p-2 border border-gray-300 rounded-lg" name="order_by">
                    </div>
                    <div>
                        <label class="block text-gray-700">Cost Code</label>
                        <input type="text" class="w-full p-2 border border-gray-300 rounded-lg" name="cost_code">
                    </div>
                </div>
            
                <!-- Section 2: Person List -->
                <div class="card mt-3">
                    <div class="card-header bg-primary text-white">
                        Person
                    </div>
                    <div class="card-body">
                        <!-- Button to trigger modal -->
                        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add person
                        </button>
            
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>KTP/ID</th>
                                    <th>Gender</th>
                                    <th>Company</th>
                                    <th>Sponsor Company</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($booking as $person)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $person->name }}</td>
                                    <td>{{ $person->ktp_id }}</td>
                                    <td>{{ $person->gender }}</td>
                                    <td>{{ $person->company }}</td>
                                    <td>{{ $person->sponsor_company }}</td>
                                    <td>
                                        <!-- Separate form for deleting person -->
                                        <form action="{{ route('person.destroy', $person->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this person?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            
                <!-- Section 3: Other Requirements -->
                <div class="mt-8">
                    <label class="block text-gray-700">Other Requirements</label>
                    <textarea class="w-full p-2 border border-gray-300 rounded-lg h-32" name="other_requirements"></textarea>
                </div>
            
                <!-- Section 4: Accommodation Details -->
                <div class="mt-8 bg-white p-5 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold mb-4">Accommodation Details</h3>
            
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
                            <tbody>
                                <tr>
                                    <td class="border border-gray-300 p-2">John Doe</td>
                                    <td class="border border-gray-300 p-2">001</td>
                                    <td class="border border-gray-300 p-2">2024-01-15</td>
                                    <td class="border border-gray-300 p-2">2024-01-20</td>
                                    <td class="border border-gray-300 p-2">Single</td>
                                    <td class="border border-gray-300 p-2">N/A</td>
                                    <td class="border border-gray-300 p-2">
                                        <button class="btn btn-primary">edit</button>
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
            

            <!-- Modal Form - moved outside the main booking form -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

        </main>
    </body>
</html>
