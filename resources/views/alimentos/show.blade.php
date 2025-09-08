@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="bg-gradient-to-r from-green-500 to-green-600 px-6 py-4">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-bold text-white">{{ $alimento->nome }}</h1>
                    <div class="flex space-x-2">
                        <a href="{{ route('alimentos.edit', $alimento) }}" 
                           class="bg-white text-green-600 px-4 py-2 rounded-lg hover:bg-gray-100 transition-colors">
                            <i class="fas fa-edit mr-2"></i>Editar
                        </a>
                        <a href="{{ route('alimentos.index') }}" 
                           class="bg-green-700 text-white px-4 py-2 rounded-lg hover:bg-green-800 transition-colors">
                            <i class="fas fa-arrow-left mr-2"></i>Voltar
                        </a>
                    </div>
                </div>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Informações Básicas -->
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Informações Básicas</h3>
                        <div class="space-y-3">
                            <div>
                                <label class="text-sm font-medium text-gray-600">Nome:</label>
                                <p class="text-gray-800">{{ $alimento->nome }}</p>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-600">Categoria:</label>
                                <p class="text-gray-800">{{ $alimento->categoria }}</p>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-600">Marca:</label>
                                <p class="text-gray-800">{{ $alimento->marca ?? 'Não informado' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Informações Nutricionais -->
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Informações Nutricionais (por 100g)</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Calorias:</span>
                                <span class="font-medium">{{ number_format($alimento->calorias, 1) }} kcal</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Proteínas:</span>
                                <span class="font-medium">{{ number_format($alimento->proteinas, 1) }}g</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Carboidratos:</span>
                                <span class="font-medium">{{ number_format($alimento->carboidratos, 1) }}g</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Gorduras:</span>
                                <span class="font-medium">{{ number_format($alimento->gorduras, 1) }}g</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Fibras:</span>
                                <span class="font-medium">{{ number_format($alimento->fibras, 1) }}g</span>
                            </div>
                        </div>
                    </div>
                </div>

                @if($alimento->observacoes)
                <div class="mt-6 bg-blue-50 rounded-lg p-4">
                    <h3 class="text-lg font-semibold text-blue-800 mb-2">Observações</h3>
                    <p class="text-blue-700">{{ $alimento->observacoes }}</p>
                </div>
                @endif

                <!-- Porções Relacionadas -->
                @if($alimento->porcoes && $alimento->porcoes->count() > 0)
                <div class="mt-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Porções Cadastradas</h3>
                    <div class="bg-white border rounded-lg overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descrição</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Peso (g)</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Calorias</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($alimento->porcoes as $porcao)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $porcao->descricao }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ number_format($porcao->peso, 1) }}g</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ number_format(($alimento->calorias * $porcao->peso) / 100, 1) }} kcal</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('porcoes.show', $porcao) }}" class="text-blue-600 hover:text-blue-900 mr-3">Ver</a>
                                        <a href="{{ route('porcoes.edit', $porcao) }}" class="text-green-600 hover:text-green-900">Editar</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif

                <!-- Timestamps -->
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <div class="flex justify-between text-sm text-gray-500">
                        <span>Criado em: {{ $alimento->created_at->format('d/m/Y H:i') }}</span>
                        <span>Atualizado em: {{ $alimento->updated_at->format('d/m/Y H:i') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection