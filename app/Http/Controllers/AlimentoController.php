<?php

namespace App\Http\Controllers;

use App\Models\Alimento;
use Illuminate\Http\Request;

class AlimentoController extends Controller
{
    public function index(Request $request)
    {
        $query = Alimento::query();

        // Filtro por nome
        if ($request->filled('nome')) {
            $query->where('nome', 'like', '%' . $request->nome . '%');
        }

        // Filtro por categoria
        if ($request->filled('categoria')) {
            $query->where('categoria', $request->categoria);
        }

        // Filtro por marca
        if ($request->filled('marca')) {
            $query->where('marca', 'like', '%' . $request->marca . '%');
        }

        // Ordenação
        $orderBy = $request->get('order_by', 'nome');
        $orderDirection = $request->get('order_direction', 'asc');
        
        if (in_array($orderBy, ['nome', 'categoria', 'marca', 'calorias', 'created_at'])) {
            $query->orderBy($orderBy, $orderDirection);
        }

        $alimentos = $query->paginate(15)->withQueryString();

        // Obter categorias únicas para o filtro
        $categorias = Alimento::distinct()->pluck('categoria')->filter()->sort();

        return view('alimentos.index', compact('alimentos', 'categorias'));
    }

    public function create()
    {
        return view('alimentos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'categoria' => 'required|string|max:100',
            'marca' => 'nullable|string|max:255',
            'calorias' => 'required|numeric|min:0',
            'proteinas' => 'required|numeric|min:0',
            'carboidratos' => 'required|numeric|min:0',
            'gorduras' => 'required|numeric|min:0',
            'fibras' => 'required|numeric|min:0',
            'observacoes' => 'nullable|string|max:1000',
        ]);

        Alimento::create($validated);

        return redirect()->route('alimentos.index')
            ->with('success', 'Alimento cadastrado com sucesso!');
    }

    public function show(Alimento $alimento)
    {
        $alimento->load('porcoes');
        return view('alimentos.show', compact('alimento'));
    }

    public function edit(Alimento $alimento)
    {
        return view('alimentos.edit', compact('alimento'));
    }

    public function update(Request $request, Alimento $alimento)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'categoria' => 'required|string|max:100',
            'marca' => 'nullable|string|max:255',
            'calorias' => 'required|numeric|min:0',
            'proteinas' => 'required|numeric|min:0',
            'carboidratos' => 'required|numeric|min:0',
            'gorduras' => 'required|numeric|min:0',
            'fibras' => 'required|numeric|min:0',
            'observacoes' => 'nullable|string|max:1000',
        ]);

        $alimento->update($validated);

        return redirect()->route('alimentos.show', $alimento)
            ->with('success', 'Alimento atualizado com sucesso!');
    }

    public function destroy(Alimento $alimento)
    {
        try {
            $alimento->delete();
            return redirect()->route('alimentos.index')
                ->with('success', 'Alimento excluído com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('alimentos.index')
                ->with('error', 'Erro ao excluir alimento. Verifique se não há porções cadastradas para este alimento.');
        }
    }
}