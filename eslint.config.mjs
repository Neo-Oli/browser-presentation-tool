import sortDestructureKeys from "eslint-plugin-sort-destructure-keys"
import preferArrow from "eslint-plugin-prefer-arrow"
import globals from "globals"
import path from "node:path"
import { fileURLToPath } from "node:url"
import js from "@eslint/js"
import { FlatCompat } from "@eslint/eslintrc"

const __filename = fileURLToPath(import.meta.url)
const __dirname = path.dirname(__filename)
const compat = new FlatCompat({
    baseDirectory: __dirname,
    recommendedConfig: js.configs.recommended,
    allConfig: js.configs.all
})

export default [
    ...compat.extends(
        "eslint:recommended",
        "standard",
        "eslint-config-prettier",
        "plugin:prettier/recommended"
    ),
    {
        plugins: {
            "sort-destructure-keys": sortDestructureKeys,
            "prefer-arrow": preferArrow
        },

        languageOptions: {
            globals: {
                ...globals.browser,
                ...globals.node
            },

            ecmaVersion: 2021,
            sourceType: "module"
        },
        files: ["**/*.js", "**/*.jsx", "**/*.ts", "**/*.tsx"],
        rules: {
            eqeqeq: "error",
            indent: ["error", 4],
            "linebreak-style": ["error", "unix"],
            "multiline-comment-style": ["error", "starred-block"],
            "no-console": "error",
            "no-var": 1,

            "prefer-arrow/prefer-arrow-functions": [
                "error",
                {
                    classPropertiesAllowed: false,
                    disallowPrototype: true,
                    singleReturnOnly: false
                }
            ],

            "prefer-template": "error",
            "prettier/prettier": "error",
            "sort-destructure-keys/sort-destructure-keys": "error"
        }
    }
]
