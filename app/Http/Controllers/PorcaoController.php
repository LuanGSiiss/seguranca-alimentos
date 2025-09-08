<?php

namespace App\Http\Controllers;

use App\Models\Porcao;
use App\Models\Alimento;
use Illuminate\Http\Request;

class PorcaoController extends Controller
{
    public function index(Request $request)
    {
        $query = Porcao::with('alimento');

        // Filtro por descrição
        if ($request->filled('descricao')) {
            $query->where('descricao', 'like', '%' . $request->descricao . '%');
        }

        // Filtro por alimento
        if ($request->filled('alimento_id')) {
            $query->where('alimento_id', $request->alimento_id);
        }

        // Filtro por peso
        if ($request->filled('peso_min')) {
            $query->where('peso', '>=', $request->peso_min);
        }

        if ($request->filled('peso_max')) {
            $query->where('peso', '<=', $request->peso_max);
        }

        // Ordenação
        $orderBy = $request->get('order_by', 'descricao');
        $orderDirection = $request->get('order_direction', 'asc');
        
        if (in_array($orderBy, ['descricao', 'peso', 'created_at'])) {
            $query->orderBy($orderBy, $orderDirection);
        } elseif ($orderBy === 'alimento') {
            $query->join('alimentos', 'porcoes.alimento_id', '=', 'alimentos.id')
                  ->orderBy('alimentos.nome', $orderDirection)
                  ->select('porcoes.*');
        }

        $porcoes = $query->paginate(15)->withQueryString();

        // Obter alimentos para o filtro
        $alimentos = Alimento::orderBy('nome')->get();

        return view('porcoes.index', compact('porcoes', 'alimentos'));
    }

    public function create()
    {
        $alimentos = Alimento::orderBy('nome')->get();
        return view('porcoes.create', compact('alimentos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'descricao' => 'required|string|max:255',
            'peso' => 'required|numeric|min:0.1',
            'alimento_id' => 'required|exists:alimentos,id',
        ]);

        Porcao::create($validated);

        return redirect()->route('porcoes.index')
            ->with('success', 'Porção cadastrada com sucesso!');
    }

    public function show(Porcao $porcao)
    {
        $porcao->load('alimento');
        return view('porcoes.show', compact('porcao'));
    }

    public function edit(Porcao $porcao)
    {
        $alimentos = Alimento::orderBy('nome')->get();
        return view('porcoes.edit', compact('porcao', 'alimentos'));
    }

    public function update(Request $request, Porcao $porcao)
    {
        $validated = $request->validate([
            'descricao' => 'required|string|max:255',
            'peso' => 'required|numeric|min:0.1',
            'alimento_id' => 'required|exists:alimentos,id',
        ]);

        $porcao->update($validated);

        return redirect()->route('porcoes.show', $porcao)
            ->with('success', 'Porção atualizada com sucesso!');
    }

    public function destroy(Porcao $porcao)
    {
        try {
            $porcao->delete();
            return redirect()->route('porcoes.index')
                ->with('success', 'Porção excluída com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('porcoes.index')
                ->with('error', 'Erro ao excluir porção.');
        }
    }
}