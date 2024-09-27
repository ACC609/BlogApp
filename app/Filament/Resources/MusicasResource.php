<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MusicasResource\Pages;
use App\Filament\Resources\MusicasResource\RelationManagers;
use App\Models\Musicas;
use Filament\Actions\ActionGroup;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;


class MusicasResource extends Resource
{
    protected static ?string $model = Musicas::class;

    protected static ?string $navigationIcon = 'heroicon-o-musical-note';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make([
                    Section::make('Cadastrando Músicas')
                        ->schema([
                            TextInput::make('artistas')
                                ->label('Nome dos artistas')
                                ->maxLength(255),
                            Forms\Components\Select::make('id_categoria')
                                ->required()
                                ->searchable()
                                ->preload()
                                ->relationship('categoria', 'nome'),
                            Forms\Components\Select::make('genero')
                                ->options([
                                    'pop' => 'Pop',
                                    'rock' => 'Rock',
                                    'jazz' => 'Jazz',
                                    'classical' => 'Clássico',
                                    'rap' => 'Rap',
                                    'drill' => 'Drill',
                                    'trap' => 'Trap',
                                    'semba' => 'Semba',
                                    'kizomba' => 'Kizomba',
                                    'kuduro' => 'Kuduro',
                                    'afrobeat' => 'Afrobeat',
                                    'highlife' => 'Highlife',
                                    'funk' => 'Funk',
                                    'bossa_nova' => 'Bossa Nova',
                                    'samba' => 'Samba',
                                    'forro' => 'Forró',
                                    'axé' => 'Axé',
                                    'pagode' => 'Pagode',
                                    'mpb' => 'MPB (Música Popular Brasileira)',
                                    'soul' => 'Soul',
                                    'reggae' => 'Reggae',
                                    'afrobeats' => 'Afrobeats',
                                    'azonto' => 'Azonto',
                                    'gqom' => 'Gqom',
                                    'marrabenta' => 'Marrabenta',
                                    'fado' => 'Fado',
                                    'morna' => 'Morna',
                                    'house' => 'House',
                                    'techno' => 'Techno',
                                    'zouk' => 'Zouk',
                                    'rnb' => 'R&B',
                                    'gospel' => 'Gospel',
                                    'funk_br' => 'Funk Brasileiro',
                                    'hip_hop' => 'Hip-Hop',
                                    'coupe_decale' => 'Coupé-Décalé',
                                    'jujù' => 'Jùjú',
                                    'fuji' => 'Fuji',
                                    'makossa' => 'Makossa',
                                    'mbaqanga' => 'Mbaqanga',
                                    'maracatu' => 'Maracatu',
                                    'calypso' => 'Calypso',
                                    'batuque' => 'Batuque',
                                    'funaná' => 'Funaná',
                                    'tango' => 'Tango',
                                    'rumba' => 'Rumba',
                                ])
                                ->searchable()
                                ->required()
                                ->label('Gênero'),
                            Forms\Components\TextInput::make('ano')
                                ->required()
                                ->numeric(),
                            Forms\Components\TextInput::make('titulo')
                                ->required()
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn(string $operation, $state, $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null)
                                ->maxLength(255),
                            Forms\Components\TextInput::make('slug')
                                ->maxLength(255)
                                ->disabled()
                                ->required()
                                ->dehydrated()
                                ->unique(Musicas::class, 'slug', ignoreRecord: true),
                            Forms\Components\TextInput::make('descricao')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\FileUpload::make('imagem')
                                ->required()
                                ->image()
                                ->preserveFilenames()
                                ->directory('MúsicasIMG'),
                            Forms\Components\FileUpload::make('musica')
                                ->label('Arquivo de Música')
                                ->directory('musics')
                                ->disk('public')
                                ->acceptedFileTypes(['audio/mpeg', 'audio/mp3'])
                                ->preserveFilenames()
                                ->required(),
                            Forms\Components\Toggle::make('status')
                                ->required(),
                            Forms\Components\Toggle::make('destaques')
                                ->required(),
                            Forms\Components\Toggle::make('mensal')
                                ->required(),
                        ])
                ])->columnSpan(2)


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('imagem')
                    ->searchable(),
                Tables\Columns\TextColumn::make('artistas')
                    ->searchable(),
                Tables\Columns\TextColumn::make('categoria.nome')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('titulo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('genero')
                    ->searchable(),
                Tables\Columns\TextColumn::make('musica')
                    ->label('Reproduzir Música')
                    ->formatStateUsing(function ($state) {
                        // Gerar o HTML do player de áudio
                        $url = asset('storage/' . $state); // Caminho para o arquivo de música
                        return "<audio controls>
                                <source src='{$url}' type='audio/mpeg'>
                                Seu navegador não suporta o elemento de áudio.
                            </audio>";
                    })
                    ->html(),
                Tables\Columns\ToggleColumn::make('status')
                    ->onColor('success')
                    ->offColor('danger')
                    ->action(function (Model $record, $state) {
                        $record->update(['status' => $state]);
                    }),
                Tables\Columns\ToggleColumn::make('destaques')
                    ->onColor('success')
                    ->offColor('danger')
                    ->action(function (Model $record, $state) {
                        $record->update(['status' => $state]);
                    }),
                Tables\Columns\ToggleColumn::make('mensal')
                    ->onColor('success')
                    ->offColor('danger')
                    ->action(function (Model $record, $state) {
                        $record->update(['status' => $state]);
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMusicas::route('/'),
            'create' => Pages\CreateMusicas::route('/create'),
            'edit' => Pages\EditMusicas::route('/{record}/edit'),
        ];
    }
}
