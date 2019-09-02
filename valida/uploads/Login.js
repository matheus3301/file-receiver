import React, {useState, useEffect} from 'react';
//import AsyncStorage from "@react-native-community/async-storage";
import {KeyboardAvoidingView,Platform, Text, StyleSheet, Image, TextInput, TouchableOpacity, Alert, AsyncStorage } from 'react-native';

import logo from '../assets/images/logo.png';

import api from '../services/api';


export default function Login({navigation}){
    const [user, setUser] = useState('');
    
    useEffect(() => {
        AsyncStorage.getItem('user').then( user => {
            if(user){

                const _id = user;

                //Alert.alert(user);

                navigation.navigate('Main', {_id});
            }
        });
    }, []);

    async function handleLogin(){
        

        const response = await api.post('/devs',{ username: user });

        const {_id} = response.data;

        await AsyncStorage.setItem('user', _id);

        //Alert.alert(`Olá ${response.data.name}`);

        navigation.navigate('Main',{_id});
    }

    return(
    <KeyboardAvoidingView 
        behavior="padding"
        enabled={Platform.OS === 'ios'}
        style={styles.container}>

        <Image source={logo}/>

        <TextInput 
            autoCapitalize="none"
            autoCorrect={false}
            placeholder="Digite seu usuário no GitHub"
            style={styles.input}
            value={user}
            onChangeText={setUser}
        />

        <TouchableOpacity 
            onPress={handleLogin}
            style={styles.button}>
            <Text style={styles.buttonText}>Entrar</Text>
        </TouchableOpacity>

    </KeyboardAvoidingView>);
}

const styles = StyleSheet.create({
    container:{
        flex:1,
        backgroundColor:'#f5f5f5',
        justifyContent:'center',
        alignItems:'center',
        padding:38,
    },
    input:{
        height:46,
        alignSelf:'stretch',
        backgroundColor:'#FFF',
        borderWidth:1,
        borderColor:'#ddd',
        borderRadius:4,
        marginTop:20,
        paddingHorizontal:15
    },

    button:{
        height:46,
        alignSelf:'stretch',
        backgroundColor:'#df4723',
        borderRadius:4,
        marginTop:10,
        justifyContent:'center',
        alignItems:'center',


    },

    buttonText:{
        color:'#fff',
        fontWeight:'bold',
        fontSize:16

    }
});