<?php

use App\Models\Testimonial;
use function Livewire\Volt\{state, mount, on, layout};

layout('layouts.app');

state([
    'testimonials' => [],
    'editing' => null,
    'content' => '',
    'name' => '',
    'title' => '',
    'avatar' => '',
    'linkedin_url' => '',
    'order' => 0,
    'is_active' => true,
    'showModal' => false,
]);

mount(function () {
    $this->loadTestimonials();
});

$loadTestimonials = function () {
    $this->testimonials = Testimonial::orderBy('order')->get();
};

$openCreateModal = function () {
    $this->reset(['editing', 'content', 'name', 'title', 'avatar', 'linkedin_url', 'order', 'is_active']);
    $this->is_active = true;
    $this->showModal = true;
};

$edit = function (Testimonial $testimonial) {
    $this->editing = $testimonial;
    $this->content = $testimonial->content;
    $this->name = $testimonial->name;
    $this->title = $testimonial->title;
    $this->avatar = $testimonial->avatar;
    $this->linkedin_url = $testimonial->linkedin_url;
    $this->order = $testimonial->order;
    $this->is_active = $testimonial->is_active;
    $this->showModal = true;
};

$save = function () {
    $validated = $this->validate([
        'content' => 'required|string',
        'name' => 'required|string|max:255',
        'title' => 'nullable|string|max:255',
        'avatar' => 'nullable|string',
        'linkedin_url' => 'nullable|url',
        'order' => 'nullable|integer',
        'is_active' => 'boolean',
    ]);

    if ($this->editing) {
        $this->editing->update($validated);
    } else {
        Testimonial::create($validated);
    }

    $this->showModal = false;
    $this->loadTestimonials();
    $this->dispatch('notify', 'Testimonial saved successfully!');
};

$delete = function ($id) {
    Testimonial::find($id)->delete();
    $this->loadTestimonials();
};

?>

<div class="bg-gray-900 min-h-screen py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="space-y-6">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-bold text-white">Manage Testimonials</h2>
                <button wire:click="openCreateModal" class="bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 rounded-lg transition-colors">
                    Add New Testimonial
                </button>
            </div>

            <div class="bg-gray-800 rounded-lg overflow-hidden border border-gray-700">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gray-900">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Avatar</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Name/Title</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-400 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        @foreach($testimonials as $testimonial)
                            <tr class="hover:bg-gray-750 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($testimonial->avatar)
                                        <img src="{{ $testimonial->avatar }}" class="h-10 w-10 rounded-full object-cover bg-gray-700" alt="">
                                    @else
                                        <div class="h-10 w-10 bg-gray-700 rounded-full flex items-center justify-center text-gray-500">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-white">{{ $testimonial->name }}</div>
                                    <div class="text-xs text-gray-500">{{ $testimonial->title }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $testimonial->is_active ? 'bg-green-900 text-green-300' : 'bg-red-900 text-red-300' }}">
                                        {{ $testimonial->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button wire:click="edit({{ $testimonial->id }})" class="text-sky-400 hover:text-sky-300 mr-3">Edit</button>
                                    <button wire:click="delete({{ $testimonial->id }})" wire:confirm="Are you sure?" class="text-red-400 hover:text-red-300">Delete</button>
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
                                        {{ $editing ? 'Edit Testimonial' : 'Add New Testimonial' }}
                                    </h3>
                                </div>
                                <div class="px-6 py-4 space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-400">Name</label>
                                        <input type="text" wire:model="name" class="mt-1 block w-full bg-gray-700 border-gray-600 rounded-md shadow-sm text-white focus:ring-sky-500 focus:border-sky-500">
                                        @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-400">Title / Company</label>
                                        <input type="text" wire:model="title" class="mt-1 block w-full bg-gray-700 border-gray-600 rounded-md shadow-sm text-white focus:ring-sky-500 focus:border-sky-500">
                                        @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-400">Testimonial Content</label>
                                        <textarea wire:model="content" rows="4" class="mt-1 block w-full bg-gray-700 border-gray-600 rounded-md shadow-sm text-white focus:ring-sky-500 focus:border-sky-500"></textarea>
                                        @error('content') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-400">Display Order</label>
                                            <input type="number" wire:model="order" class="mt-1 block w-full bg-gray-700 border-gray-600 rounded-md shadow-sm text-white focus:ring-sky-500 focus:border-sky-500">
                                        </div>
                                        <div class="flex items-center pt-6">
                                            <input type="checkbox" wire:model="is_active" class="h-4 w-4 text-sky-600 focus:ring-sky-500 border-gray-600 rounded bg-gray-700">
                                            <label class="ml-2 block text-sm text-gray-400">Active</label>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-400">Avatar URL</label>
                                        <input type="text" wire:model="avatar" placeholder="https://..." class="mt-1 block w-full bg-gray-700 border-gray-600 rounded-md shadow-sm text-white focus:ring-sky-500 focus:border-sky-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-400">LinkedIn URL</label>
                                        <input type="text" wire:model="linkedin_url" placeholder="https://linkedin.com/in/..." class="mt-1 block w-full bg-gray-700 border-gray-600 rounded-md shadow-sm text-white focus:ring-sky-500 focus:border-sky-500">
                                    </div>
                                </div>
                                <div class="px-6 py-4 bg-gray-900 flex justify-end space-x-3 rounded-b-lg">
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
