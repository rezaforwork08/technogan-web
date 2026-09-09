<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroSlideResource\Pages;
use App\Models\HeroSlide;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class HeroSlideResource extends Resource
{
    protected static ?string $model = HeroSlide::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationGroup = 'Beranda';

    protected static ?string $navigationLabel = 'Slider Hero';

    protected static ?string $modelLabel = 'slide';

    protected static ?string $pluralModelLabel = 'Slider Hero';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Konten Slide')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('subtitle')
                            ->label('Subjudul')
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('image')
                            ->label('Gambar')
                            ->image()
                            ->directory('hero-slides')
                            ->imageEditor()
                            ->helperText('Disarankan gambar dengan latar transparan atau gelap, rasio landscape (mis. 1200x900px).')
                            ->columnSpanFull(),
                    ]),
                Forms\Components\Section::make('Tombol')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('primary_button_text')
                            ->label('Teks Tombol Utama')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('primary_button_url')
                            ->label('URL Tombol Utama')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('secondary_button_text')
                            ->label('Teks Tombol Sekunder')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('secondary_button_url')
                            ->label('URL Tombol Sekunder')
                            ->maxLength(255),
                    ]),
                Forms\Components\Section::make('Pengaturan')
                    ->columns(2)
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),
                        Forms\Components\TextInput::make('order')
                            ->label('Urutan')
                            ->required()
                            ->numeric()
                            ->default(0),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label(''),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subtitle')
                    ->label('Subjudul')
                    ->limit(40),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
                Tables\Columns\TextColumn::make('order')
                    ->label('Urutan')
                    ->numeric()
                    ->sortable(),
            ])
            ->defaultSort('order')
            ->reorderable('order')
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHeroSlides::route('/'),
            'create' => Pages\CreateHeroSlide::route('/create'),
            'edit' => Pages\EditHeroSlide::route('/{record}/edit'),
        ];
    }
}
