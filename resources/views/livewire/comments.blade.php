<div>
    <div class="bg-gray-15 p-8" >
        <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg">
            <h1 class="text-2xl font-semibold mb-4">Comment create</h1>

            @if($error)
                <div class="max-w-md mx-auto bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">{{$error}}</strong>
                </div>
            @endif

            @if($success)
                <div class="max-w-md mx-auto bg-green border border-green-500 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">{{$success}}</strong>
                </div><br>
            @endif

            <form wire:submit.prevent="submitForm">
                <div class="mb-2">
                    <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
                    <input wire:model="title"  type="text" id="title" name="title" class="w-full border rounded px-3 py-2 focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-2">
                    <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
                    <textarea wire:model="description"  id="description" name="description" class="w-full border rounded px-3 py-2 focus:outline-none focus:border-blue-500"></textarea>
                </div>
                <div class="text-right">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg mb-3">
        <h1 class="text-2xl font-semibold mb-4">Search</h1>

        <div class="mb-2">
            <input type="text" placeholder="Foydalanuvchi qidirish..." class="w-full border rounded px-3 py-2 focus:outline-none focus:border-blue-500" wire:model.live="query">
        </div>
    </div>
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold mb-4">Natija</h1>
        <dl class="space-y-2">
            <!-- Birinchi ma'lumot bloki -->
            <div class="row">
                @foreach($comments as $c)
                    <div class="bg-gray-15 p-2">
                        <div class="max-w-md mx-auto bg-white p-4 rounded-lg shadow-lg">
                            <div class="flex justify-between items-center mb-4">
                                <!-- Title -->
                                <h2 class="text-lg font-semibold">{{ $c->title }}</h2>
                                <!-- Create At Time -->
                                <div class="flex">
                                    <p class="text-sm text-gray-500 pr-1"><i class="fa fa-clock"></i> {{ $c->created_at }}</p>

                                    <button class="text-red-500 hover:text-red-700" wire:click="delete({{ $c->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>

                                </div>
                            </div>
                            <!-- Description -->
                            <p class="text-gray-700">{{ $c->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

        </dl>
    </div>
</div>

<script>
    document.addEventListener('livewire:click', function () {
        Livewire.on('updated', function () {
            $('#editModal').modal('hide'); // Modal oynasini yopish
        });
    });
</script>
