@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-4">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-bold text-white">Editar Alimento</h1>
                    <a href="{{ route('alimentos.show', $alimento) }}" 
                       class="bg-white text-blue-600 px-4 py-2 rounded-lg hover:bg-gray-100 transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i>Voltar
                    </a>
                </div>
            </div>

            <div class="p-6">
                <form action="{{ route('alimentos.update', $alimento) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nome -->
                        <div>
                            <label for="nome" class="block text-sm font-medium text-gray-700 mb-2">Nome *</label>
                            <input type="text" 
                                   id="nome" 
                                   name="nome" 
                                   value="{{ old('nome', $alimento->nome) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('nome') border-red-500 @enderror"
                                   required>
                            @error('nome')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Categoria -->
                        <div>
                            <label for="categoria" class="block text-sm font-medium text-gray-700 mb-2">Categoria *</label>
                            <select id="categoria" 
                                    name="categoria" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('categoria') border-red-500 @enderror"
                                    required>
                                <option value="">Selecione uma categoria</option>
                                <option value="Cereais" {{ old('categoria', $alimento->categoria) == 'Cereais' ? 'selected' : '' }}>Cereais</option>
                                <option value="Leguminosas" {{ old('categoria', $alimento->categoria) == 'Leguminosas' ? 'selected' : '' }}>Leguminosas</option>
                                <option value="Verduras" {{ old('categoria', $alimento->categoria) == 'Verduras' ? 'selected' : '' }}>Verduras</option>
                                <option value="Frutas" {{ old('categoria', $alimento->categoria) == 'Frutas' ? 'selected' : '' }}>Frutas</option>
                                <option value="Carnes" {{ old('categoria', $alimento->categoria) == 'Carnes' ? 'selected' : '' }}>Carnes</option>
                                <option value="Peixes" {{ old('categoria', $alimento->categoria) == 'Peixes' ? 'selected' : '' }}>Peixes</option>
                                <option value="Laticínios" {{ old('categoria', $alimento->categoria) == 'Laticínios' ? 'selected' : '' }}>Laticínios</option>
                                <option value="Óleos e Gorduras" {{ old('categoria', $alimento->categoria) == 'Óleos e Gorduras' ? 'selected' : '' }}>Óleos e Gorduras</option>
                                <option value="Doces" {{ old('categoria', $alimento->categoria) == 'Doces' ? 'selected' : '' }}>Doces</option>
                                <option value="Bebidas" {{ old('categoria', $alimento->categoria) == 'Bebidas' ? 'selected' : '' }}>Bebidas</option>
                                <option value="Outros" {{ old('categoria', $alimento->categoria) == 'Outros' ? 'selected' : '' }}>Outros</option>
                            </select>
                            @error('categoria')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Marca -->
                        <div>
                            <label for="marca" class="block text-sm font-medium text-gray-700 mb-2">Marca</label>
                            <input type="text" 
                                   id="marca" 
                                   name="marca" 
                                   value="{{ old('marca', $alimento->marca) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('marca') border-red-500 @enderror">
                            @error('marca')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Calorias -->
                        <div>
                            <label for="calorias" class="block text-sm font-medium text-gray-700 mb-2">Calorias (por 100g) *</label>
                            <input type="number" 
                                   id="calorias" 
                                   name="calorias" 
                                   value="{{ old('calorias', $alimento->calorias) }}"
                                   step="0.1"
                                   min="0"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('calorias') border-red-500 @enderror"
                                   required>
                            @error('calorias')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Proteínas -->
                        <div>
                            <label for="proteinas" class="block text-sm font-medium text-gray-700 mb-2">Proteínas (g) *</label>
                            <input type="number" 
                                   id="proteinas" 
                                   name="proteinas" 
                                   value="{{ old('proteinas', $alimento->proteinas) }}"
                                   step="0.1"
                                   min="0"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('proteinas') border-red-500 @enderror"
                                   required>
                            @error('proteinas')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Carboidratos -->
                        <div>
                            <label for="carboidratos" class="block text-sm font-medium text-gray-700 mb-2">Carboidratos (g) *</label>
                            <input type="number" 
                                   id="carboidratos" 
                                   name="carboidratos" 
                                   value="{{ old('carboidratos', $alimento->carboidratos) }}"
                                   step="0.1"
                                   min="0"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('carboidratos') border-red-500 @enderror"
                                   required>
                            @error('carboidratos')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Gorduras -->
                        <div>
                            <label for="gorduras" class="block text-sm font-medium text-gray-700 mb-2">Gorduras (g) *</label>
                            <input type="number" 
                                   id="gorduras" 
                                   name="gorduras" 
                                   value="{{ old('gorduras', $alimento->gorduras) }}"
                                   step="0.1"
                                   min="0"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('gorduras') border-red-500 @enderror"
                                   required>
                            @error('gorduras')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Fibras -->
                        <div>
                            <label for="fibras" class="block text-sm font-medium text-gray-700 mb-2">Fibras (g) *</label>
                            <input type="number" 
                                   id="fibras" 
                                   name="fibras" 
                                   value="{{ old('fibras', $alimento->fibras) }}"
                                   step="0.1"
                                   min="0"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('fibras') border-red-500 @enderror"
                                   required>
                            @error('fibras')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Observações -->
                    <div>
                        <label for="observacoes" class="block text-sm font-medium text-gray-700 mb-2">Observações</label>
                        <textarea id="observacoes" 
                                  name="observacoes" 
                                  rows="4"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('observacoes') border-red-500 @enderror"
                                  placeholder="Informações adicionais sobre o alimento...">{{ old('observacoes', $alimento->observacoes) }}</textarea>
                        @error('observacoes')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Botões -->
                    <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                        <a href="{{ route('alimentos.show', $alimento) }}" 
                           class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                            Cancelar
                        </a>
                        <button type="submit" 
                                class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                            <i class="fas fa-save mr-2"></i>Salvar Alterações
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection