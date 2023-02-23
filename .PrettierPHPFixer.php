<?php

use PhpCsFixer\Fixer\FixerInterface;
use PhpCsFixer\FixerDefinition\FixerDefinitionInterface;
use PhpCsFixer\Tokenizer\Tokens;

/**
 * Fixer for using prettier-php to fix.
 */
final class PrettierPHPFixer implements FixerInterface {
    public function getPriority(): int {
        // Allow prettier to pre-process the code before php-cs-fixer
        return 999;
    }

    public function isCandidate(Tokens $tokens): bool {
        return true;
    }

    public function isRisky(): bool {
        return false;
    }

    public function fix(SplFileInfo $file, Tokens $tokens): void {
        if (
            0 < $tokens->count() &&
            $this->isCandidate($tokens) &&
            $this->supports($file)
        ) {
            $this->applyFix($file, $tokens);
        }
    }

    public function getName(): string {
        return 'Prettier/php';
    }

    public function supports(SplFileInfo $file): bool {
        return true;
    }

    private function applyFix(SplFileInfo $file, Tokens $tokens): void {
        exec("yarn prettier {$file}", $prettierOutput);
        $code = implode(\PHP_EOL, $prettierOutput);
        // if (str_starts_with($code, '---')) {
        // $exploded = explode("---\n", $code);

        // if (array_key_exists(2, $exploded)) {
        // if (!str_starts_with($exploded[1], '{')) {
        // $config = parse_ini_string($exploded[1]);
        // if ($config) {
        // $exploded[1] = "\n" . json_encode($config) . "\n";
        // }
        // }
        // $descriptorspec = [
        // 0 => ['pipe', 'r'],
        // 1 => ['pipe', 'w'],
        // 2 => ['pipe', 'w'],
        // ];
        // $process = proc_open(
        // 'yarn prettier --stdin-filepath foo.json',
        // $descriptorspec,
        // $pipes,
        // );
        // if (is_resource($process)) {
        // fwrite($pipes[0], $exploded[1]);
        // fclose($pipes[0]);

        // $result = stream_get_contents($pipes[1]);
        // fclose($pipes[1]);

        // $return_value = proc_close($process);
        // if ($return_value === 0) {
        // $exploded[1] = $result;
        // }
        // } else {
        // echo 'Pipe error';
        // }
        // $code = implode("---\n", $exploded);
        // }
        // }
        // $tokens->setCode($code . "\n");
        $tokens->setCode($code);
    }

    public function getDefinition(): FixerDefinitionInterface {
    }
}
