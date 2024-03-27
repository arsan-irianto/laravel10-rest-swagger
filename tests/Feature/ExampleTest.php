<?php

test('test_the_application_returns_a_successful_response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
