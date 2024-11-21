<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('admin.header')
    </head>
    <body>
        @include('admin.body')

        <main class="p-10 md:ml-64 h-auto pt-[72px]">
            <p class="text-2xl font-bold pt-16 pb-2">Camp List</p>

            <div class="flex justify-between items-center pb-4">
                <!-- Filter by Dropdown -->
                {{-- <div>
                    <select class="border rounded py-2 px-4">
                        <option>Filter by</option>
                        <option>Block</option>
                        <option>Room Type</option>
                        <option>Status</option>
                    </select>
                </div> --}}
                <!-- Search Bar -->
                <div>
                    <input type="text" placeholder="Search" class="border rounded py-2 px-4">
                </div>
                <!-- Add New Room Button -->
                <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded flex items-center" type="button" data-bs-toggle="modal" data-bs-target="#roomModal">
                    <span class="mr-2">Add New Room</span>
                    <span class="text-white text-xl">+</span>
                </button>
            </div>
        
            <!-- Table Section -->
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="min-w-full bg-white border">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="text-left py-3 px-4">#</th>
                            <th class="text-left py-3 px-4">Block</th>
                            <th class="text-left py-3 px-4">Room</th>
                            <th class="text-left py-3 px-4">Room Type</th>
                            <th class="text-left py-3 px-4">Status</th>
                            <th class="text-left py-3 px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- use this if gonna play with some database --}}
        
                        @foreach($rooms as $index => $room)
                        <tr class="border-b">
                            <td class="py-3 px-4">{{ $index + 1 }}</td>
                            <td class="py-3 px-4">{{ $room->block }}</td>
                            <td class="py-3 px-4">{{ $room->room_number }}</td>
                            <td class="py-3 px-4">{{ $room->room_type }}</td>
                            <td class="py-3 px-4">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $room->status_class }}">
                                    {{ $room->status }}
                                </span>
                            </td>
                            <td class="py-3 px-4">
                                <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-4 rounded">
                                    Manage
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    

                        <!-- add camp. Modal form -->
                        <div class="modal fade" id="roomModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Room</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="#" method="POST">
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
                        <!-- End of Modal Form -->


                    </tbody>
                </table>
            </div>
        </main>
    </body>
</html>