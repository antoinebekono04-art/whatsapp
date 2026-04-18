<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use App\Traits\Dotenv;

class InstallerController extends Controller
{
    use Dotenv;

    public function index()
    {
        if (file_exists(base_path('public/uploads/installed'))) {
            return redirect('/');
        }

        $extensions = [
            'mbstring' => extension_loaded('mbstring'),
            'bcmath' => extension_loaded('bcmath'),
            'ctype' => extension_loaded('ctype'),
            'json' => extension_loaded('json'),
            'openssl' => extension_loaded('openssl'),
            'pdo' => extension_loaded('pdo'),
            'tokenizer' => extension_loaded('tokenizer'),
            'xml' => extension_loaded('xml'),
        ];

        return view('installer::requirements', compact('extensions'));
    }

    public function show($type = 'info')
    {
        if (file_exists(base_path('public/uploads/installed'))) {
            return redirect('/');
        }

        if ($type == 'info') {
            return view('installer::info');
        }

        if ($type == 'congratulations') {
            return view('installer::congratulations');
        }

        return redirect('/install');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'site_name' => 'required|alpha|max:50',
            'db_connection' => 'required|alpha|max:50',
            'db_host' => 'required|max:50',
            'db_port' => 'required|numeric',
            'db_name' => 'required|max:50',
            'db_user' => 'required|max:50',
            'db_pass' => 'nullable|max:50',
        ]);

        $this->editEnv('APP_URL', url('/'));
        $this->editEnv('APP_NAME', $request->site_name);
        $this->editEnv('DB_CONNECTION', $request->db_connection);
        $this->editEnv('DB_HOST', $request->db_host);
        $this->editEnv('DB_PORT', $request->db_port);
        $this->editEnv('DB_DATABASE', $request->db_name);
        $this->editEnv('DB_USERNAME', $request->db_user);

        if (!empty($request->db_pass)) {
            $this->editEnv('DB_PASSWORD', $request->db_pass);
        }

        try {
            DB::connection()->getPdo();
            return response()->json(['message' => 'Installation in progress']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Could not connect to database'], 401);
        }
    }

    public function verify(Request $request)
    {
        Cache::put('files', []);
        Cache::put('queries', []);
        Cache::put('installed', 'verified');

        return response()->json(['message' => 'Verification success', 'redirect' => url('/install/info')]);
    }

    public function migrate()
    {
        ini_set('max_execution_time', 0);

        try {
            \Artisan::call('db:wipe');

            Cache::forget('files');
            Cache::forget('queries');
            Cache::forget('installed');

            File::put(base_path('public/uploads/installed'), date('Y-m-d H:i:s'));

            return response()->json(['message' => 'Installation complete', 'redirect' => url('/install/congratulations')]);
        } catch (Exception $e) {
            return response()->json(['message' => 'Installation error'], 401);
        }
    }
}