import { resolve } from 'path';

export const entry = './resources/js/app.js';
export const output = {
    filename: 'bundle.js',
    path: resolve(__dirname, 'public/js'),
};
export const module = {
    rules: [
        {
            test: /\.js$/,
            exclude: /node_modules/,
            use: {
                loader: 'babel-loader',
            },
        },
    ],
};
