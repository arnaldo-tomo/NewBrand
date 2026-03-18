<?php

use App\Models\Skill;
use function Livewire\Volt\{state, mount, on, layout};

layout('layouts.app');

state([
    'skills' => [],
    'editing' => null,
    'name' => '',
    'category' => 'backend',
    'icon' => '',
    'proficiency' => 5,
    'order' => 0,
    'is_active' => true,
    'showModal' => false,
]);

mount(function () {
    $this->loadSkills();
});

$loadSkills = function () {
    $this->skills = Skill::orderBy('order')->get();
};

$openCreateModal = function () {
    $this->reset(['editing', 'name', 'category', 'icon', 'proficiency', 'order', 'is_active']);
    $this->category = 'backend';
    $this->proficiency = 5;
    $this->is_active = true;
    $this->showModal = true;
};

$edit = function (Skill $skill) {
    $this->editing = $skill;
    $this->name = $skill->name;
    $this->category = $skill->category;
    $this->icon = $skill->icon;
    $this->proficiency = $skill->proficiency;
    $this->order = $skill->order;
    $this->is_active = $skill->is_active;
    $this->showModal = true;
};

$save = function () {
    $validated = $this->validate([
        'name' => 'required|string|max:255',
        'category' => 'required|string|in:backend,frontend,mobile,design',
        'icon' => 'nullable|string',
        'proficiency' => 'required|integer|min:1|max:5',
        'order' => 'nullable|integer',
        'is_active' => 'boolean',
    ]);

    if ($this->editing) {
        $this->editing->update($validated);
    } else {
        Skill::create($validated);
    }

    $this->showModal = false;
    $this->loadSkills();
    $this->dispatch('notify', 'Skill saved successfully!');
};

$delete = function ($id) {
    Skill::find($id)->delete();
    $this->loadSkills();
};

?>

<div class="bg-gray-900 min-h-screen py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="space-y-6">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-bold text-white">Manage Skills (Tech Stack)</h2>
                <button wire:click="openCreateModal" class="bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 rounded-lg transition-colors">
                    Add New Skill
                </button>
            </div>

            <div class="bg-gray-800 rounded-lg overflow-hidden border border-gray-700">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gray-900">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Icon</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Category</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Proficiency</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-400 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        @foreach($skills as $skill)
                            <tr class="hover:bg-gray-750 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($skill->icon)
                                        <img src="{{ $skill->icon }}" class="h-8 w-8 object-contain" alt="">
                                    @else
                                        <i class="fas fa-tools text-gray-500"></i>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">{{ $skill->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">{{ ucfirst($skill->category) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex space-x-1">
                                        @for($i = 1; $i <= 5; $i++)
                                            <span class="h-2 w-2 rounded-full {{ $i <= $skill->proficiency ? 'bg-sky-500' : 'bg-gray-700' }}"></span>
                                        @endfor
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button wire:click="edit({{ $skill->id }})" class="text-sky-400 hover:text-sky-300 mr-3">Edit</button>
                                    <button wire:click="delete({{ $skill->id }})" wire:confirm="Are you sure?" class="text-red-400 hover:text-red-300">Delete</button>
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
                                        {{ $editing ? 'Edit Skill' : 'Add New Skill' }}
                                    </h3>
                                </div>
                                <div class="px-6 py-4 space-y-4">
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-400">Name</label>
                                            <input type="text" wire:model="name" class="mt-1 block w-full bg-gray-700 border-gray-600 rounded-md shadow-sm text-white focus:ring-sky-500 focus:border-sky-500">
                                            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-400">Category</label>
                                            <select wire:model="category" class="mt-1 block w-full bg-gray-700 border-gray-600 rounded-md shadow-sm text-white focus:ring-sky-500 focus:border-sky-500">
                                                <option value="backend">Backend</option>
                                                <option value="frontend">Frontend</option>
                                                <option value="mobile">Mobile</option>
                                                <option value="design">Design & DevOps</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-400">Icon URL</label>
                                        <input type="text" wire:model="icon" placeholder="https://..." class="mt-1 block w-full bg-gray-700 border-gray-600 rounded-md shadow-sm text-white focus:ring-sky-500 focus:border-sky-500">
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-400">Proficiency (1-5)</label>
                                            <input type="number" wire:model="proficiency" min="1" max="5" class="mt-1 block w-full bg-gray-700 border-gray-600 rounded-md shadow-sm text-white focus:ring-sky-500 focus:border-sky-500">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-400">Display Order</label>
                                            <input type="number" wire:model="order" class="mt-1 block w-full bg-gray-700 border-gray-600 rounded-md shadow-sm text-white focus:ring-sky-500 focus:border-sky-500">
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" wire:model="is_active" class="h-4 w-4 text-sky-600 focus:ring-sky-500 border-gray-600 rounded bg-gray-700">
                                        <label class="ml-2 block text-sm text-gray-400">Active</label>
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
