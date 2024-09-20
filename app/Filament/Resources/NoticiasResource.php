<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NoticiasResource\Pages;
use App\Filament\Resources\NoticiasResource\RelationManagers;
use App\Models\Noticias;
use Filament\Forms;
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

class NoticiasResource extends Resource
{
    protected static ?string $model = Noticias::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Cadastro de Notícias')
                    ->schema([
                        Forms\Components\TextInput::make('titulo')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn(string $operation, $state, $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null)
                            ->maxLength(255),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->disabled()
                            ->dehydrated()
                            ->unique(Noticias::class, 'slug', ignoreRecord: true),

                        Forms\Components\Textarea::make('descricao')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\MarkdownEditor::make('texto')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('banner')
                            ->required()
                            ->columnSpanFull()
                            ->directory('Notícias'),
                        Toggle::make('status')
                            ->default(true)
                            ->required()
                    ])->columns(2)

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('banner')
                    ->searchable(),
                Tables\Columns\TextColumn::make('titulo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
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
            'index' => Pages\ListNoticias::route('/'),
            'create' => Pages\CreateNoticias::route('/create'),
            'edit' => Pages\EditNoticias::route('/{record}/edit'),
        ];
    }
}
