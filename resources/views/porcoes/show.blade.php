@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="bg-gradient-to-r from-purple-500 to-purple-600 px-6 py-4">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-bold text-white">{{ $porcao->descricao }}</h1>
                    <div class="flex space-x-2">
                        <a href="{{ route('porcoes.edit', $porcao) }}" 
                           class="bg-white text-purple-600 px-4 py-2 rounded-lg hover:bg-gray-100 transition-colors">
                            <i class="fas fa-edit mr-2"></i>Editar
                        </a>
                        <a href="{{ route('porcoes.index') }}" 
                           class="bg-purple-700 text-white px-4 py-2 rounded-lg hover:bg-purple-800 transition-colors">
                            <i class="fas fa-arrow-left mr-2"></i>Voltar
                        </a>
                    </div>
                </div>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Informações da Porção -->
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Informações da Porção</h3>
                        <div class="space-y-3">
                            <div>
                                <label class="text-sm font-medium text-gray-600">Descrição:</label>
                                <p class="text-gray-800">{{ $porcao->descricao }}</p>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-600">Peso:</label>
                                <p class="text-gray-800">{{ number_format($porcao->peso, 1) }}g</p>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-600">Alimento:</label>
                                <p class="text-gray-800">
                                    <a href="{{ route('alimentos.show', $porcao->alimento) }}" 
                                       class="text-blue-600 hover:text-blue-800 underline">
                                        {{ $porcao->alimento->nome }}
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Informações Nutricionais Calculadas -->
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Informações Nutricionais desta Porção</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Calorias:</span>
                                <span class="font-medium">{{ number_format(($porcao->alimento->calorias * $porcao->peso) / 100, 1) }} kcal</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Proteínas:</span>
                                <span class="font-medium">{{ number_format(($porcao->alimento->proteinas * $porcao->peso) / 100, 1) }}g</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Carboidratos:</span>
                                <span class="font-medium">{{ number_format(($porcao->alimento->carboidratos * $porcao->peso) / 100, 1) }}g</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Gorduras:</span>
                                <span class="font-medium">{{ number_format(($porcao->alimento->gorduras * $porcao->peso) / 100, 1) }}g</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Fibras:</span>
                                <span class="font-medium">{{ number_format(($porcao->alimento->fibras * $porcao->peso) / 100, 1) }}g</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Informações do Alimento Base -->
                <div class="mt-6 bg-blue-50 rounded-lg p-4">
                    <h3 class="text-lg font-semibold text-blue-800 mb-4">Informações do Alimento Base (por 100g)</h3>
                    <div class="grid grid-cols-2 md:grid-cols-5 gap-4 text-center">
                        <div>
                            <p class="text-sm text-blue-600">Calorias</p>
                            <p class="font-semibold text-blue-800">{{ number_format($porcao->alimento->calorias, 1) }} kcal</p>
                        </div>
                        <div>
                            <p class="text-sm text-blue-600">Proteínas</p>
                            <p class="font-semibold text-blue-800">{{ number_format($porcao->alimento->proteinas, 1) }}g</p>
                        </div>
                        <div>
                            <p class="text-sm text-blue-600">Carboidratos</p>
                            <p class="font-semibold text-blue-800">{{ number_format($porcao->alimento->carboidratos, 1) }}g</p>
                        </div>
                        <div>
                            <p class="text-sm text-blue-600">Gorduras</p>
                            <p class="font-semibold text-blue-800">{{ number_format($porcao->alimento->gorduras, 1) }}g</p>
                        </div>
                        <div>
                            <p class="text-sm text-blue-600">Fibras</p>
                            <p class="font-semibold text-blue-800">{{ number_format($porcao->alimento->fibras, 1) }}g</p>
                        </div>
                    </div>
                </div>

                <!-- Timestamps -->
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <div class="flex justify-between text-sm text-gray-500">
                        <span>Criado em: {{ $porcao->created_at->format('d/m/Y H:i') }}</span>
                        <span>Atualizado em: {{ $porcao->updated_at->format('d/m/Y H:i') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection