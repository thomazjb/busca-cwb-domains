<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class DomainController extends Controller
{

    /**
    * Store the new Domain.
    */
    public function store(Request $request): RedirectResponse
    {

        $registeredAt = Carbon::createFromFormat('d/m/Y', $request->input('registered_at'))->format('Y-m-d');
        $expiresAt = Carbon::createFromFormat('d/m/Y', $request->input('expires_at'))->format('Y-m-d');

        $domain = new Domain();
        $domain->domain = $request->input('domain');
        $domain->host = $request->input('host');
        $domain->registered_at = $registeredAt;
        $domain->expires_at = $expiresAt;
        $domain->notes = $request->input('notes') ?? null;
        $domain->save();

        return Redirect::route('dashboard')->with('success', 'Domínio adicionado com sucesso!');
    }

    /**
    * Delete the selected Domain.
    */
    public function destroy(Domain $domain): RedirectResponse
    {
        $domain->delete();
        return Redirect::route('dashboard')->with('success', 'Domínio excluído com sucesso!');
    }

    /**
    * Edit a Domain.
    */
    public function edit(Request $request, Domain $domain)
    {
       
        // Validação dos dados da requisição
        $validatedData = $request->validate([
            'domain' => 'required|string|max:255',
            'host' => 'required|string|max:255',
            'registered_at' => 'required|date',
            'expires_at' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        $domain->update($validatedData);

        return redirect()->route('dashboard')->with('success', 'Domínio atualizado com sucesso.');
    }
    
}
