<?php

use App\Models\Education;
use function Livewire\Volt\{state, mount, on, layout};

layout('layouts.app');

state([
    'education' => [],
    'editing' => null,
    'title' => '',
    'institution' => '',
    'period' => '',
    'description' => '',
    'logo' => '',
    'order' => 0,
    'showModal' => false,
]);

mount(function () {
    $this->loadEducation();
});

$loadEducation = function () {
    $this->education = Education::orderBy('order')->get();
};

$openCreateModal = function () {
    $this->reset(['editing', 'title', 'institution', 'period', 'description', 'logo', 'order']);
    $this->showModal = true;
};

$edit = function (Education $edu) {
    $this->editing = $edu;
    $this->title = $edu->title;
    $this->institution = $edu->institution;
    $this->period = $edu->period;
    $this->description = $edu->description;
    $this->logo = $edu->logo;
    $this->order = $edu->order;
    $this->showModal = true;
};

$save = function () {
    $validated = $this->validate([
        'title' => 'required|string|max:255',
        'institution' => 'nullable|string|max:255',
        'period' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'logo' => 'nullable|string',
        'order' => 'nullable|integer',
    ]);

    if ($this->editing) {
        $this->editing->update($validated);
    } else {
        Education::create($validated);
    }

    $this->showModal = false;
    $this->loadEducation();
    $this->dispatch('notify', 'Education saved successfully!');
};

$delete = function ($id) {
    Education::find($id)->delete();
    $this->loadEducation();
};

?>

<div class="bg-gray-900 min-h-screen py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="space-y-6">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-bold text-white">Manage Education</h2>
                <button wire:click="openCreateModal" class="bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 rounded-lg transition-colors">
                    Add New Education
                </button>
            </div>

            <div class="bg-gray-800 rounded-lg overflow-hidden border border-gray-700">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gray-900">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Logo</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Title/Institution</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Period</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-400 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        @foreach($education as $edu)
                            <tr class="hover:bg-gray-750 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($edu->logo)
                                        <img src="{{ asset($edu->logo) }}" class="h-10 w-10 rounded object-contain bg-gray-700 p-1" alt="">
                                    @else
                                        <div class="h-10 w-10 bg-gray-700 rounded flex items-center justify-center text-gray-500">
                                            <i class="fas fa-graduation-cap"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-white">{{ $edu->title }}</div>
                                    <div class="text-sm text-gray-400">{{ $edu->institution }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                    {{ $edu->period }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button wire:click="edit({{ $edu }})" class="text-sky-400 hover:text-sky-300 mr-3">Edit</button>
                                    <button wire:click="delete({{ $edu->id }})" wire:confirm="Are you sure?" class="text-red-400 hover:text-red-300">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Modal Form -->
            @if($showModal)
                <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" aria-hidden="true" wire:click="$set('showModal', false)"></div>

                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                        <div class="inline-block align-bottom bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-gray-700">
                            <form wire:submit.prevent="save">
                                <div class="px-6 py-4 border-b border-gray-700">
                                    <h3 class="text-lg font-medium text-white" id="modal-title">
                                        {{ $editing ? 'Edit Education' : 'Add New Education' }}
                                    </h3>
                                </div>
                                <div class="px-6 py-4 space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-400">Title / Degree</label>
                                        <input type="text" wire:model="title" class="mt-1 block w-full bg-gray-700 border-gray-600 rounded-md shadow-sm text-white focus:ring-sky-500 focus:border-sky-500">
                                        @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-400">Institution</label>
                                        <input type="text" wire:model="institution" class="mt-1 block w-full bg-gray-700 border-gray-600 rounded-md shadow-sm text-white focus:ring-sky-500 focus:border-sky-500">
                                        @error('institution') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-400">Period</label>
                                            <input type="text" wire:model="period" placeholder="e.g. 2020 - 2024" class="mt-1 block w-full bg-gray-700 border-gray-600 rounded-md shadow-sm text-white focus:ring-sky-500 focus:border-sky-500">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-400">Display Order</label>
                                            <input type="number" wire:model="order" class="mt-1 block w-full bg-gray-700 border-gray-600 rounded-md shadow-sm text-white focus:ring-sky-500 focus:border-sky-500">
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-400">Description</label>
                                        <textarea wire:model="description" rows="3" class="mt-1 block w-full bg-gray-700 border-gray-600 rounded-md shadow-sm text-white focus:ring-sky-500 focus:border-sky-500"></textarea>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-400">Logo URL / Path</label>
                                        <input type="text" wire:model="logo" placeholder="images/example.png" class="mt-1 block w-full bg-gray-700 border-gray-600 rounded-md shadow-sm text-white focus:ring-sky-500 focus:border-sky-500">
                                    </div>
                                </div>
                                <div class="px-6 py-4 bg-gray-900 flex justify-end space-x-3">
                                    <button type="button" wire:click="$set('showModal', false)" class="text-gray-400 hover:text-white px-4 py-2">Cancel</button>
                                    <button type="submit" class="bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 rounded-lg">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
