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

        $request->validate(
            [
                'domain' => 'required|string|unique:domains|max:255|regex:/^([a-zA-Z0-9\-]+\.)+[a-zA-Z]{2,}$/',
                'host' => 'required|string|max:255|regex:/^([a-zA-Z0-9\-]+\.)+[a-zA-Z]{2,}$/',
                'registered_at' => 'required|date_format:d/m/Y|before_or_equal:expires_at',
                'expires_at' => 'required|date_format:d/m/Y|after_or_equal:registered_at',
                'notes' => 'nullable|string|max:1000',
            ],
            [   'unique' => 'O domínio precisa ser único!',
                'before_or_equal' => 'A data de registro precisa anteceder a data de expiração!',
                'after_or_equal' => 'a Data de expiração não pode ser menor que a data de registro!',
                'domain.regex' => 'É necessário que o domínio seja uma url válida!',
                'host.regex' => 'É necessário que o host seja uma url válida!'
            ]
        );

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
       
        $validatedData = $request->validate([
            'domain' => 'required|string|unique:domains|max:255|regex:/^([a-zA-Z0-9\-]+\.)+[a-zA-Z]{2,}$/',
            'host' => 'required|string|max:255|regex:/^([a-zA-Z0-9\-]+\.)+[a-zA-Z]{2,}$/',
            'registered_at' => 'required|date|before_or_equal:expires_at',
                'expires_at' => 'required|date|after_or_equal:registered_at',
            'notes' => 'nullable|string',
        ],
        [   'unique' => 'O domínio precisa ser único!',
            'before_or_equal' => 'A data de registro precisa anteceder a data de expiração!',
            'after_or_equal' => 'a Data de expiração não pode ser menor que a data de registro!',
            'domain.regex' => 'É necessário que o domínio seja uma url válida!',
            'host.regex' => 'É necessário que o host seja uma url válida!'
        ]);

        $domain->update($validatedData);

        return redirect()->route('dashboard')->with('success', 'Domínio atualizado com sucesso.');
    }
    
}
