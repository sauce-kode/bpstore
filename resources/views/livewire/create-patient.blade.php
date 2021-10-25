<div>
    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="w-1/3">
                @include('includes.alert')
                <form class=" shadow-lg p-5" wire:submit.prevent="create">
                    <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        Name
                    </label>
                    <input wire:model="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror" type="text">
                    @error('name')<p class="text-red-500 text-xs italic">{{ $message }}</p>@enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                            Phone Number
                        </label>
                        <input wire:model="phoneNumber" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('phoneNumber') border-red-500 @enderror" type="text">
                        @error('phoneNumber')<p class="text-red-500 text-xs italic">{{ $message }}</p>@enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                            Date Of Birth
                        </label>
                        <input wire:model="dateOfBirth" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('dateOfBirth') border-red-500 @enderror" type="date">
                        @error('dateOfBirth')<p class="text-red-500 text-xs italic">{{ $message }}</p>@enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                            Gender
                        </label>
                        <select wire:model="gender" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('gender') border-red-500 @enderror">
                            <option value="">Select One</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        @error('gender')<p class="text-red-500 text-xs italic">{{ $message }}</p>@enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                            Address
                        </label>
                        <textarea wire:model="address" cols="5" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('address') border-red-500 @enderror"></textarea>
                        @error('address')<p class="text-red-500 text-xs italic">{{ $message }}</p>@enderror
                    </div>
                    <div class="flex items-center justify-center">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Submit
                    </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>