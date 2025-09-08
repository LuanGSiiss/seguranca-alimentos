@@ .. @@
                 <div class="bg-white p-6 rounded-lg shadow-sm">
                     <form method="GET" action="{{ route('alimentos.index') }}" class="space-y-4">
                         <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                             <!-- Filtro por Nome -->
                             <div>
                                 <label for="nome" class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
                                 <input type="text" 
                                        id="nome" 
                                        name="nome" 
-                                       value="{{ request('search') }}"
+                                       value="{{ request('nome') }}"
                                        placeholder="Buscar por nome..."
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                             </div>

                             <!-- Filtro por Categoria -->
                             <div>
                                 <label for="categoria" class="block text-sm font-medium text-gray-700 mb-1">Categoria</label>
                                 <select id="categoria" 
                                         name="categoria" 
                                         class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                     <option value="">Todas as categorias</option>
-                                    <option value="cereais" {{ request('categoria') == 'cereais' ? 'selected' : '' }}>Cereais</option>
-                                    <option value="leguminosas" {{ request('categoria') == 'leguminosas' ? 'selected' : '' }}>Leguminosas</option>
-                                    <option value="verduras" {{ request('categoria') == 'verduras' ? 'selected' : '' }}>Verduras</option>
-                                    <option value="frutas" {{ request('categoria') == 'frutas' ? 'selected' : '' }}>Frutas</option>
-                                    <option value="carnes" {{ request('categoria') == 'carnes' ? 'selected' : '' }}>Carnes</option>
-                                    <option value="peixes" {{ request('categoria') == 'peixes' ? 'selected' : '' }}>Peixes</option>
-                                    <option value="laticinios" {{ request('categoria') == 'laticinios' ? 'selected' : '' }}>Laticínios</option>
-                                    <option value="oleos" {{ request('categoria') == 'oleos' ? 'selected' : '' }}>Óleos e Gorduras</option>
-                                    <option value="doces" {{ request('categoria') == 'doces' ? 'selected' : '' }}>Doces</option>
-                                    <option value="bebidas" {{ request('categoria') == 'bebidas' ? 'selected' : '' }}>Bebidas</option>
-                                    <option value="outros" {{ request('categoria') == 'outros' ? 'selected' : '' }}>Outros</option>
+                                    @foreach($categorias as $categoria)
+                                        <option value="{{ $categoria }}" {{ request('categoria') == $categoria ? 'selected' : '' }}>
+                                            {{ $categoria }}
+                                        </option>
+                                    @endforeach
                                 </select>
                             </div>

                             <!-- Filtro por Marca -->
                             <div>
                                 <label for="marca" class="block text-sm font-medium text-gray-700 mb-1">Marca</label>
                                 <input type="text" 
                                        id="marca" 
                                        name="marca" 
                                        value="{{ request('marca') }}"
                                        placeholder="Buscar por marca..."
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                             </div>

+                            <!-- Ordenação -->
+                            <div>
+                                <label for="order_by" class="block text-sm font-medium text-gray-700 mb-1">Ordenar por</label>
+                                <select id="order_by" 
+                                        name="order_by" 
+                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
+                                    <option value="nome" {{ request('order_by') == 'nome' ? 'selected' : '' }}>Nome</option>
+                                    <option value="categoria" {{ request('order_by') == 'categoria' ? 'selected' : '' }}>Categoria</option>
+                                    <option value="marca" {{ request('order_by') == 'marca' ? 'selected' : '' }}>Marca</option>
+                                    <option value="calorias" {{ request('order_by') == 'calorias' ? 'selected' : '' }}>Calorias</option>
+                                    <option value="created_at" {{ request('order_by') == 'created_at' ? 'selected' : '' }}>Data de Criação</option>
+                                </select>
+                            </div>
+                        </div>
+
+                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                             <!-- Botões de Ação -->
                             <div class="flex space-x-2">
                                 <button type="submit" 
                                         class="flex-1 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors">
                                     <i class="fas fa-search mr-2"></i>Filtrar
                                 </button>
                                 <a href="{{ route('alimentos.index') }}" 
                                    class="flex-1 bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-colors text-center">
                                     <i class="fas fa-times mr-2"></i>Limpar
                                 </a>
                             </div>
+
+                            <!-- Direção da Ordenação -->
+                            <div>
+                                <label class="block text-sm font-medium text-gray-700 mb-1">Direção</label>
+                                <div class="flex space-x-2">
+                                    <label class="flex items-center">
+                                        <input type="radio" name="order_direction" value="asc" 
+                                               {{ request('order_direction', 'asc') == 'asc' ? 'checked' : '' }}
+                                               class="mr-2">
+                                        <span class="text-sm">Crescente</span>
+                                    </label>
+                                    <label class="flex items-center">
+                                        <input type="radio" name="order_direction" value="desc" 
+                                               {{ request('order_direction') == 'desc' ? 'checked' : '' }}
+                                               class="mr-2">
+                                        <span class="text-sm">Decrescente</span>
+                                    </label>
+                                </div>
+                            </div>
                         </div>
                     </form>
                 </div>