<?php

namespace App\Livewire;

use App\Models\Todo;
use Filament\Tables\Actions\Action;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ListTodos extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->relationship(fn (Todo $todo) => $todo->user)
            ->query(Todo::query()->where('user_id', auth()->id()))
            ->columns([
                TextColumn::make('title')
                    ->label('Title')
                    ->translateLabel(),
                TextColumn::make('start_date')
                    ->label('Start Date')
                    ->translateLabel()
                    ->since(),
                TextColumn::make('end_date')
                    ->label('End Date')
                    ->translateLabel()
                    ->since(),
                TextColumn::make('status')
                    ->label('Status')
                    ->translateLabel()
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'completed' => 'success',
                        'canceled' => 'danger',
                        default => 'gray',
                    }),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                Action::make('edit')
                    ->label('Edit')
                    ->translateLabel()
                    ->url(fn (Todo $record): string => route('todos.edit', $record))
                    ->openUrlInNewTab(),
                Action::make('delete')
                    ->label('Delete')
                    ->translateLabel()
                    ->requiresConfirmation()
                    ->action(fn (Todo $record) => $record->delete())
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render(): View
    {
        return view('livewire.list-todos')->layout('layouts.app');
    }
}
