<?php

test('if initial page is correct loaded', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('if initial page has the correct title', function () {
    $response = $this->get('/');

    $response->assertSee('TodoApp - seu lembrete diário');
});

test('if initial page has the correct description', function () {
    $response = $this->get('/');

    $response->assertSee('é um aplicativo de tarefas para você nunca mais perder o que realmente importa');
});

test('if initial page has the register button', function () {
    $response = $this->get('/');

    $response->assertSee('Crie uma conta gratuita agora');
});

test('if initial unauthenticated user can see log in and register links', function () {
    $response = $this->get('/');

    $response->assertSee('Register');
    $response->assertSee('Log in');
});
