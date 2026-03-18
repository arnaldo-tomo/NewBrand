<?php

use App\Models\Project;
use function Livewire\Volt\{state, mount, layout};

layout('layouts.app');

state([
    'projects'      => [],
    'editingId'     => null,   // só guarda o ID, nunca o model
    'title'         => '',
    'description'   => '',
    'image'         => '',
    'playstore_link'=> '',
    'appstore_link' => '',
    'features'      => [],
    'newFeature'    => '',
    'order'         => 0,
    'is_active'     => true,
    'showModal'     => false,
    'successMsg'    => '',
]);

mount(function () {
    $this->projects = Project::orderBy('order')->get();
});

$openCreateModal = function () {
    $this->resetValidation();
    $this->editingId     = null;
    $this->title         = '';
    $this->description   = '';
    $this->image         = '';
    $this->playstore_link= '';
    $this->appstore_link = '';
    $this->features      = [];
    $this->newFeature    = '';
    $this->order         = 0;
    $this->is_active     = true;
    $this->successMsg    = '';
    $this->showModal     = true;
};

$edit = function ($id) {
    $project = Project::findOrFail($id);
    $this->resetValidation();
    $this->editingId     = $project->id;
    $this->title         = $project->title;
    $this->description   = $project->description ?? '';
    $this->image         = $project->image ?? '';
    $this->playstore_link= $project->playstore_link ?? '';
    $this->appstore_link = $project->appstore_link ?? '';
    $this->features      = $project->features ?? [];
    $this->order         = $project->order ?? 0;
    $this->is_active     = (bool) $project->is_active;
    $this->successMsg    = '';
    $this->showModal     = true;
};

$addFeature = function () {
    if (trim($this->newFeature)) {
        $this->features[] = trim($this->newFeature);
        $this->newFeature = '';
    }
};

$removeFeature = function ($index) {
    unset($this->features[$index]);
    $this->features = array_values($this->features);
};

$save = function () {
    $data = $this->validate([
        'title'         => 'required|string|max:255',
        'description'   => 'required|string',
        'image'         => 'nullable|string',
        'playstore_link'=> 'nullable|url|max:500',
        'appstore_link' => 'nullable|url|max:500',
        'features'      => 'nullable|array',
        'order'         => 'nullable|integer',
        'is_active'     => 'boolean',
    ]);

    // converter strings vazias em null
    $data['playstore_link'] = $data['playstore_link'] ?: null;
    $data['appstore_link']  = $data['appstore_link']  ?: null;
    $data['image']          = $data['image']          ?: null;

    if ($this->editingId) {
        Project::findOrFail($this->editingId)->update($data);
        $this->successMsg = 'Projeto atualizado com sucesso!';
    } else {
        Project::create($data);
        $this->successMsg = 'Projeto criado com sucesso!';
    }

    $this->projects = Project::orderBy('order')->get();
    $this->showModal = false;
};

$delete = function ($id) {
    Project::findOrFail($id)->delete();
    $this->projects = Project::orderBy('order')->get();
};

?>

<div class="bg-gray-900 min-h-screen py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="space-y-6">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-bold text-white">Manage Projects</h2>
                <button wire:click="openCreateModal" class="bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 rounded-lg transition-colors">
                    + Add New Project
                </button>
            </div>

            @if($successMsg)
            <div class="bg-green-900/50 border border-green-700 text-green-300 px-4 py-3 rounded-lg flex items-center gap-2">
                <i class="fas fa-check-circle"></i> {{ $successMsg }}
            </div>
            @endif

            <div class="bg-gray-800 rounded-lg overflow-hidden border border-gray-700">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gray-900">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Image</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Title</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-400 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        @foreach($projects as $project)
                            <tr class="hover:bg-gray-750 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($project->image)
                                        <img src="{{ asset($project->image) }}" class="h-10 w-16 rounded object-cover bg-gray-700" alt="">
                                    @else
                                        <div class="h-10 w-16 bg-gray-700 rounded flex items-center justify-center text-gray-500">
                                            <i class="fas fa-code"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-white">{{ $project->title }}</div>
                                    <div class="text-xs text-gray-500">{{ Str::limit($project->description, 50) }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $project->is_active ? 'bg-green-900 text-green-300' : 'bg-red-900 text-red-300' }}">
                                        {{ $project->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button wire:click="edit({{ $project->id }})" class="text-sky-400 hover:text-sky-300 mr-3">Editar</button>
                                    <button wire:click="delete({{ $project->id }})" wire:confirm="Tens a certeza que queres apagar?" class="text-red-400 hover:text-red-300">Apagar</button>
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
                        <div class="inline-block align-bottom bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full border border-gray-700">
                            <form wire:submit.prevent="save">
                                <div class="px-6 py-4 border-b border-gray-700">
                                    <h3 class="text-lg font-medium text-white" id="modal-title">
                                        {{ $editingId ? 'Editar Projeto' : 'Novo Projeto' }}
                                    </h3>
                                </div>
                                <div class="px-6 py-4 grid grid-cols-2 gap-6">
                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-400">Título *</label>
                                            <input type="text" wire:model="title"
                                                class="mt-1 block w-full bg-gray-700 border rounded-md shadow-sm text-white focus:ring-sky-500 focus:border-sky-500 px-3 py-2
                                                       {{ $errors->has('title') ? 'border-red-500' : 'border-gray-600' }}">
                                            @error('title') <p class="text-red-400 text-xs mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p> @enderror
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-400">Descrição * <span class="text-gray-500">(HTML permitido)</span></label>
                                            <textarea wire:model="description" rows="5"
                                                class="mt-1 block w-full bg-gray-700 border rounded-md shadow-sm text-white focus:ring-sky-500 focus:border-sky-500 px-3 py-2
                                                       {{ $errors->has('description') ? 'border-red-500' : 'border-gray-600' }}"></textarea>
                                            @error('description') <p class="text-red-400 text-xs mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p> @enderror
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
                                            <label class="block text-sm font-medium text-gray-400">Imagem (URL ou caminho)</label>
                                            <input type="text" wire:model="image" placeholder="images/project.png"
                                                class="mt-1 block w-full bg-gray-700 border-gray-600 rounded-md shadow-sm text-white focus:ring-sky-500 focus:border-sky-500 px-3 py-2">
                                        </div>
                                    </div>
                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-400">Link Play Store</label>
                                            <input type="text" wire:model="playstore_link" placeholder="https://play.google.com/..."
                                                class="mt-1 block w-full bg-gray-700 border rounded-md shadow-sm text-white focus:ring-sky-500 focus:border-sky-500 px-3 py-2
                                                       {{ $errors->has('playstore_link') ? 'border-red-500' : 'border-gray-600' }}">
                                            @error('playstore_link') <p class="text-red-400 text-xs mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p> @enderror
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-400">Link App Store</label>
                                            <input type="text" wire:model="appstore_link" placeholder="https://apps.apple.com/..."
                                                class="mt-1 block w-full bg-gray-700 border rounded-md shadow-sm text-white focus:ring-sky-500 focus:border-sky-500 px-3 py-2
                                                       {{ $errors->has('appstore_link') ? 'border-red-500' : 'border-gray-600' }}">
                                            @error('appstore_link') <p class="text-red-400 text-xs mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p> @enderror
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-400">Features</label>
                                            <div class="mt-1 flex space-x-2">
                                                <input type="text" wire:model="newFeature" wire:keydown.enter.prevent="addFeature" placeholder="Add a feature..." class="block w-full bg-gray-700 border-gray-600 rounded-md shadow-sm text-white focus:ring-sky-500 focus:border-sky-500">
                                                <button type="button" wire:click="addFeature" class="bg-gray-600 hover:bg-gray-500 text-white px-3 py-1 rounded-md transition-colors">Add</button>
                                            </div>
                                            <ul class="mt-3 space-y-2 max-h-40 overflow-y-auto">
                                                @foreach($features as $index => $feature)
                                                    <li class="flex justify-between items-center bg-gray-750 px-3 py-1 rounded text-sm text-gray-300">
                                                        <span>{{ $feature }}</span>
                                                        <button type="button" wire:click="removeFeature({{ $index }})" class="text-red-500 hover:text-red-400">&times;</button>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
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
