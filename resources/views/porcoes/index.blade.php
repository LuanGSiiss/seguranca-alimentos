@@ .. @@
                                         <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                             <div class="flex space-x-2">
                                                 <a href="{{ route('porcoes.show', $porcao) }}" 
                                                    class="text-blue-600 hover:text-blue-900">
                                                     <i class="fas fa-eye"></i>
                                                 </a>
                                                 <a href="{{ route('porcoes.edit', $porcao) }}" 
                                                    class="text-green-600 hover:text-green-900">
                                                     <i class="fas fa-edit"></i>
                                                 </a>
-                                                <button onclick="confirmarExclusao({{ $porcao->id }})" 
+                                                <form action="{{ route('porcoes.destroy', $porcao) }}" 
+                                                      method="POST" 
+                                                      class="inline"
+                                                      onsubmit="return confirm('Tem certeza que deseja excluir esta porção?')">
+                                                    @csrf
+                                                    @method('DELETE')
+                                                    <button type="submit"
                                                             class="text-red-600 hover:text-red-900">
                                                         <i class="fas fa-trash"></i>
                                                     </button>
+                                                </form>
                                             </div>
                                         </td>
                                     </tr>