<?php

require_once '.PrettierPHPFixer.php';

$finder = PhpCsFixer\Finder::create()->in(__DIR__);
$config = new PhpCsFixer\Config();

return $config
    ->registerCustomFixers(new PhpCsFixerCustomFixers\Fixers())
    ->registerCustomFixers([new PrettierPHPFixer()])
    ->setRules([
        'Prettier/php' => false,
        '@Symfony' => true,
        '@Symfony:risky' => true,
        'standardize_increment' => false,
        'concat_space' => ['spacing' => 'one'],
        'increment_style' => ['style' => 'post'],
        'trailing_comma_in_multiline' => ['elements' => ['arrays']],
        'array_indentation' => true,
        'array_push' => true,
        'yoda_style' => false,
        'explicit_string_variable' => true,
        'simple_to_complex_string_variable' => true,
        'method_chaining_indentation' => true,
        PhpCsFixerCustomFixers\Fixer\PhpdocNoSuperfluousParamFixer::name() => true,
        PhpCsFixerCustomFixers\Fixer\NoSuperfluousConcatenationFixer::name() => true,
        PhpCsFixerCustomFixers\Fixer\NoUselessParenthesisFixer::name() => true,
        PhpCsFixerCustomFixers\Fixer\NoUselessStrlenFixer::name() => true,
        'echo_tag_syntax' => ['format' => 'short'],
        'blank_line_after_opening_tag' => true,
        // only since php 7.4
        'use_arrow_functions' => false,
        'blank_line_before_statement' => ['statements' => ['return']],
        'no_useless_sprintf' => true,
        'psr_autoloading' => false,
        'no_closing_tag' => false,
        'class_attributes_separation' => [
            'elements' => [
                'const' => 'one',
                'method' => 'one',
                'property' => 'one',
                'trait_import' => 'none',
            ],
        ],
        'no_extra_blank_lines' => [
            'tokens' => [
                'break',
                'case',
                'continue',
                'curly_brace_block',
                'default',
                'extra',
                'parenthesis_brace_block',
                'return',
                'square_brace_block',
                'switch',
                'throw',
                'use',
            ],
        ],
        'braces_position' => [
            'classes_opening_brace' => 'same_line',
            'functions_opening_brace' => 'same_line',
        ],
    ])
    ->setFinder($finder)
    ->setIndent('    ')
    ->setLineEnding("\n")
    ->setRiskyAllowed(true);
