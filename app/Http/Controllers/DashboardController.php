<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\Ticket; // <--- Importar o Model Ticket

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // 1. Projetos Recentes
        $recentProjects = Project::where('user_id', $user->id)
                                ->latest()
                                ->take(3)
                                ->get();

        // 2. Projetos Ativos
        $activeProjectsCount = Project::where('user_id', $user->id)
                                    ->where('status', '!=', 'concluido')
                                    ->count();

        // 3. Chamados (AGORA É REAL!)
        // Conta quantos chamados não estão "resolvidos"
        $openTickets = Ticket::where('user_id', $user->id)
                            ->where('status', '!=', 'resolvido')
                            ->count();

        return view('dashboard', compact('recentProjects', 'activeProjectsCount', 'openTickets'));
    }
}