

<div class="flex flex-col">

  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
       @if(session()->has('message'))
       <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3 relative" role="alert" x-data="{show: true}" x-show="show">
        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
        <p>{{session('message')}}</p>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3" @click="show =false">
            <svg class="fill-current h-6 w-6 text-white" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
      </div>
       @endif 
      <div class="flex justify-between">
      <div class="p-2">
      <input wire:model.debounce.500ms="q" type="search" placeholder="Search" class="shadow appearance-none border roundded w-full py-2 px-3 txt.gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
      
      </div>
      <div class="mr-2">
      <div class="mr-2">
        <x-jet-button wire:click="confirmingItemAdd" class="bg-blue-500 hover:bg-blue-700">   
        Nuevo cliente 
        </x-jet-button>
       </div>
      <input type="checkbox" class="mr-2 leading-tight" wire:model="active"/> ActiveOnly?
      </div>
</div>

      

        <table class="min-w-full divide-y divide-gray-200 table-fixed " >
          <thead class="bg-gray-50">
      
            <tr class="border-solid border-4 border-light-blue-500 ...">
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                <button wire:click="sortBy('id')">Id</button>
                
              </th>

              <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-solid border-4 border-light-blue-500 ...">

                <button wire:click="sortBy('nombre')"> CEDULA</button>
              </th>
              <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-solid border-4 border-light-blue-500 ...">
                Nombre
              </th>
              <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-solid border-4 border-light-blue-500 ...">
                Apellido
              </th>
              <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-solid border-4 border-light-blue-500 ...">
                Direccion
              </th>
              <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-solid border-4 border-light-blue-500 ...">
                Celular
              </th>
              <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-solid border-4 border-light-blue-500 ...">
                Plan
              </th>
              <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-solid border-4 border-light-blue-500 ...">
                IP
              </th>
              @if(!$active)
              <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-solid border-4 border-light-blue-500 ...">
                Estado
              </th>
              @endif
              

              <th scope="col" class="relative px-3 py-3">
                <span class="sr-only">Eliminar</span>
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
          @foreach($items as $item)
            <tr class="border-solid border-4 border-light-blue-500 ...">
              <td class="px-3 py-4 whitespace-nowrap border-solid border-4 border-light-blue-500 ...">
                <div class="flex items-center ">
                  <div class="flex-shrink-0 h-10 w-10">
                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                  </div>
                  <div class="ml-2">
                    <div class="text-sm font-medium text-gray-900">
                    {{$item->id}}
                    </div>
                  </div>
                </div>
              </td>
              <td class="px-3 py-4 whitespace-nowrap border-solid border-4 border-light-blue-500 ...">
                <div class="text-sm text-gray-900"> {{$item->cedula}}</div>
              </td>
              <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500 border-solid border-4 border-light-blue-500 ...">
              {{$item->nombre}}
              </td>
              <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500 border-solid border-4 border-light-blue-500 ...">
              {{$item->apellido}}
              </td>
              <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500 border-solid border-4 border-light-blue-500 ...">
              {{$item->direccion}}
              </td>
              <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500 border-solid border-4 border-light-blue-500 ...">
              {{$item->celular}}
              </td>
              <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500 border-solid border-4 border-light-blue-500 ...">
              {{$item->plan}}
              </td>
              <td class="px-3 py-4 whitespace-nowrap border-solid border-4 border-light-blue-500 ...">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 border-solid border-4 border-light-blue-500 ...">
                  
                  <a href="{{$item->ip}}" target="_blank"> {{$item->ip}}</a>
                </span>
              </td>
              @if(!$active)
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 border-solid border-4 border-light-blue-500 ...">
              {{$item->estado ? 'Activo':'Inactivo'}}
              </td>
              @endif

              

              <td class="px-3 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <x-jet-button wire:click="confirmItemEdit({{$item->id}})" class="bg-orange-500 hover:bg-orange-700">   
                          <!-- Boton Editar... -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                          <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                          <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                        </svg>
                    </x-jet-button>

                    <x-jet-danger-button wire:click="confirmItemDeletion({{$item->id}})" wire:loading.attr="disabled">
                     <span class="w-4 h-4 ml-0">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                      </svg>
                     </span>
                  </x-jet-danger-button>
              </td>

            </tr>

            <!-- More items... -->
            @endforeach
          </tbody>
        </table>
        <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
        {{$items->links()}}
        </div>

        <x-jet-confirmation-modal wire:model="confirmingItemDeletion">
            <x-slot name="title">
                {{ __('Eliminar cliente') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Esta seguro de eliminar al cliente ? ') }}

            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('confirmingItemDeletion',false)" wire:loading.attr="disabled">
                    {{ __('Cancelar') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="deleteItem({{$confirmingItemDeletion}})" wire:loading.attr="disabled">
                    {{ __('Eliminar') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-confirmation-modal>
   

        <x-jet-dialog-modal wire:model="confirmingItemAdd">
            <x-slot name="title">
                {{ isset($this->item->id)?'Editar Cliente' :'Agregar Cliente' }}
            </x-slot>

            <x-slot name="content">
                  <div class="col-span-6 sm:col-span-4">
                  <x-jet-label for="cedula" value="{{ __('Cedula') }}" />
                  <x-jet-input id="cedula" type="text" class="mt-1 block w-full" wire:model.defer="item.cedula" />
                  <x-jet-input-error for="item.cedula" class="mt-2" />
                  </div>

                  <div class="col-span-6 sm:col-span-4">
                  <x-jet-label for="nombre" value="{{ __('Nombre') }}" />
                  <x-jet-input id="nombre" type="text" class="mt-1 block w-full" wire:model.defer="item.nombre" />
                  <x-jet-input-error for="item.nombre" class="mt-2" />
                  </div>

                  <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="apellido" value="{{ __('Apellido') }}" />
                    <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="item.apellido" />
                    <x-jet-input-error for="item.apellido" class="mt-2" />
                  </div>

                  <div class="col-span-6 sm:col-span-4">
                  <x-jet-label for="direccion" value="{{ __('Direccion') }}" />
                  <x-jet-input id="direccion" type="text" class="mt-1 block w-full" wire:model.defer="item.direccion" />
                  <x-jet-input-error for="item.direccion" class="mt-2" />
                  </div>

                  <div class="col-span-6 sm:col-span-4">
                  <x-jet-label for="celular" value="{{ __('Celular') }}" />
                  <x-jet-input id="celular" type="text" class="mt-1 block w-full" wire:model.defer="item.celular" />
                  <x-jet-input-error for="item.celular" class="mt-2" />
                  </div>

                  <div class="col-span-6 sm:col-span-4">
                  <x-jet-label for="plan" value="{{ __('Plan') }}" />
                  <x-jet-input id="plan" type="text" class="mt-1 block w-full" wire:model.defer="item.plan" />
                  <x-jet-input-error for="item.celular" class="mt-2" />
                  </div>

                  <div class="col-span-6 sm:col-span-4">
                  <x-jet-label for="ip" value="{{ __('Ip') }}" />
                  <x-jet-input id="ip" type="text" class="mt-1 block w-full" wire:model.defer="item.ip" />
                  <x-jet-input-error for="item.ip" class="mt-2" />
                  </div>

                  <div class="col-span-6 sm:col-span-4">
                  <label for="flex items-center">
                  <input type="checkbox" wire:model.defer="item.estado" class="form-checkbox "/>
                  <samp class="ml-2 text-sm text-gray-600">Activo</samp>
                  </label>
                  </div>


            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('confirmingItemAdd',false)" wire:loading.attr="disabled">
                    {{ __('Cancelar') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="saveItem()" wire:loading.attr="disabled">
                    {{ __('Guardar') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
      </div>
    </div>
  </div>
</div>
