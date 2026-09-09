<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class ManageSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationLabel = 'Pengaturan Situs';

    protected static ?string $title = 'Pengaturan Situs';

    protected static ?string $navigationGroup = 'Pengaturan';

    protected static string $view = 'filament.pages.manage-settings';

    public ?array $data = [];

    protected static array $settingKeys = [
        'company_address',
        'company_phone',
        'company_whatsapp',
        'company_email',
        'company_hours',
        'social_facebook',
        'social_instagram',
        'social_linkedin',
        'social_youtube',
        'map_embed_url',
        'seo_default_title',
        'seo_default_description',
    ];

    public function mount(): void
    {
        $values = [];
        foreach (self::$settingKeys as $key) {
            $values[$key] = Setting::get($key);
        }

        $this->form->fill($values);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Kontak')
                    ->columns(2)
                    ->schema([
                        Forms\Components\Textarea::make('company_address')
                            ->label('Alamat')
                            ->rows(2)
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('company_phone')
                            ->label('Telepon'),
                        Forms\Components\TextInput::make('company_whatsapp')
                            ->label('Nomor WhatsApp (format: 62812xxxx)'),
                        Forms\Components\TextInput::make('company_email')
                            ->label('Email')
                            ->email(),
                        Forms\Components\TextInput::make('company_hours')
                            ->label('Jam Operasional'),
                    ]),
                Forms\Components\Section::make('Media Sosial')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('social_facebook')->label('Facebook URL'),
                        Forms\Components\TextInput::make('social_instagram')->label('Instagram URL'),
                        Forms\Components\TextInput::make('social_linkedin')->label('LinkedIn URL'),
                        Forms\Components\TextInput::make('social_youtube')->label('YouTube URL'),
                    ]),
                Forms\Components\Section::make('Peta & SEO')
                    ->schema([
                        Forms\Components\TextInput::make('map_embed_url')
                            ->label('Google Maps Embed URL')
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('seo_default_title')
                            ->label('Meta Title Default'),
                        Forms\Components\Textarea::make('seo_default_description')
                            ->label('Meta Description Default')
                            ->rows(2),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $state = $this->form->getState();

        foreach ($state as $key => $value) {
            Setting::set($key, $value);
        }

        Notification::make()
            ->title('Pengaturan berhasil disimpan')
            ->success()
            ->send();
    }
}
