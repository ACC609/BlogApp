<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlbunsResource\Pages;
use App\Filament\Resources\AlbunsResource\RelationManagers;
use App\Models\Albuns;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class AlbunsResource extends Resource
{
    protected static ?string $model = Albuns::class;

    protected static ?string $navigationIcon = 'heroicon-o-musical-note';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make([
                    Section::make('Cadastro de Albuns')
                        ->schema([
                            Forms\Components\TextInput::make('titulo')
                                ->required()
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn(string $operation, $state, $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null)
                                ->maxLength(255),
                            Forms\Components\FileUpload::make('imagem')
                                ->required()
                                ->image()
                                ->directory('AlbunsIMG'),
                            Forms\Components\FileUpload::make('arquivo')
                                ->label('Arquivo Zip')
                                ->directory('albums/arquivos')
                                ->required()
                                ->maxSize(50240)
                        ])->columns(1),
                ])->columnSpan(1),

                Group::make([
                    Section::make('Associação')
                        ->schema([
                            Forms\Components\TextInput::make('slug')
                                ->maxLength(255)
                                ->disabled()
                                ->required()
                                ->dehydrated()
                                ->unique(Albuns::class, 'slug', ignoreRecord: true),
                            Forms\Components\Select::make('id_artistas')
                                ->label('Artistas')
                                ->required()
                                ->searchable()
                                ->preload()
                                ->relationship('artista', 'nome'),
                            Forms\Components\TextInput::make('ano')
                                ->required()
                                ->numeric(),
                            Toggle::make('status')
                                ->default(true)
                                ->required()
                        ])

                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('imagem')
                    ->sortable(),
                Tables\Columns\TextColumn::make('artista.nome')
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('titulo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ano')
                    ->searchable(),
                Tables\Columns\TextColumn::make('arquivo')
                    ->searchable(),

                ToggleColumn::make('status')
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
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListAlbuns::route('/'),
            'create' => Pages\CreateAlbuns::route('/create'),
            'edit' => Pages\EditAlbuns::route('/{record}/edit'),
        ];
    }
}
